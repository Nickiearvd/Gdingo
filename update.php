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

	// Get all ingredients 
			$getIng = "SELECT * FROM Ingredients";
			
			$stmt = $db->prepare($getIng);
			$stmt->bind_result($IngId, $NameIng);
			$stmt->execute();

	// GET ALL THE INFORMATION TO DISPLAY THEM 


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
			if(isset($_POST['updateDrink'])){ // If the form addDrink has been submitted

				@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

				if ($db->connect_error) {
					echo "could not connect: " . $db->connect_error;
					print("<br><a href=index.php>Return to home page </a>");
					exit();
				}

				$NewDrinkName = $_POST['DrinkName'];
				$NewDrinkReceipt = $_POST['DrinkReceipt'];
				$Ingredients = $_POST['Ingredients'];


				$updateDrink = "UPDATE Drinks SET DrinkName=$NewDrinkName, DrinkReceipt=$NewDrinkReceipt WHERE Drinks.DrinkId=$DrinkId;"; // Insert the values into the database. 

				$stmt = $db->prepare($updateDrink);
				$stmt->bind_param('ss',$NewDrinkName, $NewDrinkReceipt);
				$stmt->execute(); 

				header('location:update.php');
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
				<h4>Change name here</h4>
				<input class="fieldDrink" type="text" placeholder="Name" name="DrinkName"></br>
				<div class="updateDrink">

				</div>
				<input  class="receipt" type="text" required placeholder="Receipt" name="DrinkReceipt"></br>
				<input class='button3' type="submit" name="addDrink">
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
	</style>
</html>