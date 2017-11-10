<?php include "config.php"; ?>
<?php include "header.php"; ?>
<?php 

	$DrinkId = trim($_GET['DrinkId']); // Get the DrinkId from the finddrinks page the user clicked on.

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}

	// GET ALL THE INFORMATION TO DISPLAY THEM 
	$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkSaved, Drinks.DrinkPicture, Drinks.DrinkReceipt, Ingredients.IngId, Ingredients.NameIng
	FROM Drinks 
	JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
	JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId 
	WHERE Drinks.DrinkId=$DrinkId" ; // Get all the informartion related to the drinkid

	$result = $db->query($query);
	$stmt = $db->prepare($query);
	$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkSaved, $DrinkPicture, $DrinkReceipt, $IngId, $NameIng); // Same as the query. 
	$stmt->execute();
	$alling=array(); // Create an array in reason to store all the differents ingredients. 

	while ($stmt->fetch()) {
		array_push($alling,$NameIng); // Put the ingredients in the array
	}

	// GET ALL THE INFORMATION TO DISPLAY THEM 
	//Add one ingredient

			if(isset($_POST['addIng'])){

				@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

				if ($db->connect_error) {
					echo "could not connect: " . $db->connect_error;
					print("<br><a href=index.php>Return to home page </a>");
					exit();
				}

				$NewNameIng = $_POST['NameIng'];

				$addIng = "INSERT INTO Ingredients(NameIng) VALUES(?);";

				$stmt = $db->prepare($addIng);
				$stmt->bind_param('s',$NewNameIng);
				$stmt->execute(); 
				header('location:createdrinks.php');

			}
			// Get all ingredients 
			$getIng = "SELECT * FROM Ingredients";
			
			$stmt = $db->prepare($getIng);
			$stmt->bind_result($IngId, $NameIng);
			$stmt->execute();



			if(isset($_POST['updateDrink'])){ // If the form addDrink has been submitted

				@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

				if ($db->connect_error) {
					echo "could not connect: " . $db->connect_error;
					print("<br><a href=index.php>Return to home page </a>");
					exit();
				}

				if (isset($_POST['DrinkName']) && !empty($_POST['DrinkName'])) { // Check if the namefield isnt empty. 
					$NewDrinkName = $_POST['DrinkName'];
				}else{ // Else it takes the name it have before. 
					$NewDrinkName =$DrinkName;
				}
				
				if (isset($_POST['DrinkReceipt']) && !empty($_POST['DrinkReceipt'])) { // Check if the namefield isnt empty. 
					$NewDrinkReceipt = $_POST['DrinkReceipt'];
				}else{ // Else it takes the name it have before. 
					$NewDrinkReceipt = $DrinkReceipt;
				}

				
				$Ingredients = $_POST['Ingredients'];


				$updateDrink = "UPDATE Drinks SET DrinkName='$NewDrinkName', DrinkReceipt='$NewDrinkReceipt' WHERE DrinkId=$DrinkId"; // Insert the values into the database. 
		
				$stmt = $db->prepare($updateDrink);
				$stmt->bind_param('ss',$DrinkName,$DrinkReceipt);
				$stmt->execute(); 
				echo"<script>window.location = 'mypanel.php';</script>"; // Redirect to the panel after made changes. 
				$DrinkId = mysqli_insert_id($db); // Returns the last autogenerated id used in the last query. 

				foreach ($Ingredients as $index => $Id){
					@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

					$addDrinksIng = "INSERT INTO DrinksIng(DrinkId,IngId) VALUES ('$DrinkId','$Id')";

					$stmt = $db->prepare($addDrinksIng);
					$stmt->execute();

				}
				/* foreach ($Ingredients as $index => $Id){
					@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

					$updateDrinksIng = "UPDATE DrinksIng SET DrinksIng='$NewDrinkReceipt' WHERE DrinkId=$DrinkId";
					INSERT INTO DrinksIng(DrinkId,IngId) VALUES ('$DrinkId','$Id')";

					$stmt = $db->prepare($addDrinksIng);
					$stmt->execute();*/
			}

?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>UpdateDrink</title>
	</head>
	<body>
		<div class='c'>
		<div class="drinkside">
		<div  class="back">
			<a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
		</div>
		<div class="allforms">
			<form method="post">
				<h2>Update " <?php echo $DrinkName; ?> "</h2>
				<input class="fieldDrink" type="text" placeholder="Name" name="DrinkName"></br>
				<div class="updateDrink">
				<div class='ingrblack'>
					<ul><?php foreach($alling as $value){
		    			echo "<li>" . $value . "</li><br>";} ?> <!-- Print out each value that you can find into the ingredients array -->
		    		</ul>
		    	</div>
					<ul id="IngToDrink">
						
					</ul>
					<select class="select" id="Ingredients" name="addIng[]">
					<?php 
						while ($stmt->fetch()){
							echo"<option value='".$IngId."'>".$NameIng."</option>";
						}
					?>
					</select>
					<button class='button' id="connectDrinkIng" for="addIng">Add Ingredient</button></br>
					<button class='button2'>You don't find your ingredient? Click here to add more</button></br>
				</div>
				<input  class="receipt" type="text" placeholder="Receipt" name="DrinkReceipt"></br>
				<input class='button3' type="submit" name="updateDrink">
			</form>
		
			<form class="ingredientForm" method="post">
				<img src="Images/tri-2svart.png" class="tri"> <!-- triangle -->
				<div class="ingredientFromint">
				<h3>Add Ingredient</h3>
				<input class="fieldDrink" type="text" required placeholder="Name" name="NameIng"></br>
				<input class='button3' type="submit" name="addIng">
				</div>
				<img src="Images/tri-3svart.png" class="tri"> <!-- triangle -->
			</form>
			</div>

			<script type="text/javascript" src="addIng.js"></script>
		</div>
		</div>
	</body>
	<style>
		.c{
			padding-top: 150px;
		}
		/***************TEXT STYLE****************/

		h2{
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 40px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 30px;
			text-align: center;
		}

		h3{
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 40px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 5px;
			text-align: center;


		}

		/***************Buttons***************/
		.drinkside{
			position: relative;
			float:left;
			width:100%;
			text-align: center;
			margin-bottom: 20px;
		}
		.back{
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			left:10px;
			top:-50px;
		}
		.knapp{
			width: 40px;
		}

		/***************ADDINGR***************/

		#IngToDrink{
			margin:0;
			padding:0;
			padding-bottom: 10px;

		}

		#IngToDrink li{
			text-decoration: none;
			font-family: 'open sans',helvetica;
			list-style: none;
			margin:0;

		}
		.ingredientForm{
			display: none;
		}
		.ingredientForm.open{
			display: block;
			position: absolute;
			top:260px;
			width:70%;
			left:15%;
		}
		.ingredientFromint{
			background-color:black;
			height:150px;
			padding-top: 0;
			margin:0;
			padding:0;
		}
		.ingredientFromint h3{
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 20px;
			color:white;
			margin:0;
			margin-top: -4px;
			text-align: center;
		}

		.ingredientFromint .fieldDrink{
			margin-top:10px;
		}
		.allforms{
			position: relative;
		}
		.ingrblack{
			padding-top: 10px;
		}
		li{
			font-family: 'open sans',helvetica;
			font-weight: 300;
			list-style: none;
			padding:0;
		}
		ul{
			text-decoration: none;
			margin:0;
			text-align:center;
			padding:0;
		}
		.tri{
			width:100%;
		}
	</style>
</html>