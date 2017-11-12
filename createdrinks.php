
<?php include "config.php"; ?>
<?php include "header.php"; ?>
<?php require ("includes/config.php"); ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
	</head>
	<body>
	<div id="white">
		<div class='c'>
			<h2>Create your special drink</h2>
			<div id="pinkline"></div>
				<div id="imageside">
					<div class="drinkside">
						<div  class="back">

							<a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
						</div>
					</div>
					<?php

						$DrinkPicture = trim($_GET['DrinkPicture']); // Gets the prev. uploaded picture from "uploadfile page"

					
					    echo "<img class='drinkimagepreview' src=Images/DrinkPictures/$DrinkPicture>"; // Shows the image the user uploaded the page before. 


						@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

						if ($db->connect_error) {
							echo "could not connect: " . $db->connect_error;
							print("<br><a href=index.php>Return to home page </a>");
							exit();
						}

						if(isset($_POST['addIng'])){ //add ingredient

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

						if(isset($_POST['addDrink'])){ // If the form addDrink has been submitted

							@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

							if ($db->connect_error) {
								echo "could not connect: " . $db->connect_error;
								print("<br><a href=index.php>Return to home page </a>");
								exit();
							}

							$NewDrinkName = $_POST['DrinkName'];
							$NewDrinkReceipt = $_POST['DrinkReceipt'];
							$Ingredients = $_POST['Ingredients'];

							// SECURITY

							$NewDrinkName = mysqli_real_escape_string($db, $NewDrinkName);
					        $NewDrinkName= htmlentities($NewDrinkName);

					        $NewDrinkReceipt = mysqli_real_escape_string($db, $NewDrinkReceipt);
					        $NewDrinkReceipt = htmlentities($NewDrinkReceipt);


							$User=($_SESSION['username']);
							$addDrink = "INSERT INTO Drinks(DrinkName, DrinkReceipt, DrinkPicture, DrinkAuthor) VALUES(?,?,?,?);"; // Insert the values into the database. 

							$stmt = $db->prepare($addDrink);
							$stmt->bind_param('ssss',$NewDrinkName, $NewDrinkReceipt, $DrinkPicture, $User);
							$stmt->execute(); 

							$DrinkId = mysqli_insert_id($db); // Returns the last autogenerated id used in the last query. 

							foreach ($Ingredients as $index => $Id){
								@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

								$addDrinksIng = "INSERT INTO DrinksIng(DrinkId,IngId) VALUES ('$DrinkId','$Id')";

								$stmt = $db->prepare($addDrinksIng);
								$stmt->execute();
								echo"<script>window.location = 'memberpage.php';</script>"; // Redirect to the panel after made changes. 
							}
							header('location:createdrinks.php');
						}
						// Get all ingredients 
						$getIng = "SELECT * FROM Ingredients";
						$stmt = $db->prepare($getIng);
						$stmt->bind_result($IngId, $NameIng);
						$stmt->execute();
					?>
			</div>
			<div class="allforms">
				<form method="post">
					<input class="fieldDrink" type="text" required placeholder="Name..." name="DrinkName"></br>
					<div class="addDrink">
						<ul id="IngToDrink">
							
						</ul>
						<select class="select" id="Ingredients" name="addIng[]">
						<?php 
							while ($stmt->fetch()){
								echo"<option value='".$IngId."'>".$NameIng."</option>";
							}
						?>
						</select>
						<button class='button' id="connectDrinkIng" for="addIng"><img class="iconIMG" src="Images/plus.png" ></button></br>
						<button class='button2'>New Ingredient</button></br>
					</div>
					<input  class="receipt" type="text" required placeholder="Receipt" name="DrinkReceipt"></br>
					

					<button class='button3' type="submit"  name="addDrink">DONE</button>
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
		</div>
	</div>
	<div id="footerINC">
		<?php include 'footer.php';?>
	</div>
		<script type="text/javascript" src="addIng.js"></script>


	
	</body>
	<style>
		html{
			background-color: white;
		}
		body{
			background-color: white;
		}
		#white{
			background-color: white;
			width: 100%;
			display: block;
			overflow: hidden;

		}
		.c{
			padding-top:150px;
			position:relative;
			background-color: white;

		}
		.drinkimagepreview{
			width: 80%;
			max-width: 500px;
			margin:0 auto;
			display:block;
			margin-bottom:20px;		


		}
		#footerINC{
			background-color: #000;
			width: 100%;

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
		#pinkline{
			height: 2.5px;
			width: 280px;
			margin: 10px auto 15px auto;
			background-color: #e72262;
			padding: 0;

		}
		p{
			font-family: 'open sans',helvetica;
			text-align: center;
			
		}
		/***************BUTTONS****************/

		.button{
			width:25px;
			margin:0px;
			display: block;
			margin:auto;
			text-align: center;
			background-color: #e72262;
			color: #fff;
			border:solid 2px #e72262;
			border-radius: 50%;
			padding: 0;
			height:25px;
			font-size: 10px;
			float:left;
			cursor: pointer;
		} 
		.button2{
			margin: 30px auto 20px auto;
			text-align: center;
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 14px;
			background-color: #e72262;
			color: #fff;
			border:none;
			width:200px;
			padding: 5px;
			-webkit-appearance: none;
			display: block;
			border-radius: 5px;
		} 

		.button:focus, .button2:focus, .button3:focus { 
			outline: none;
			cursor: pointer;
		}

		.button3{
			margin: 10px auto 20px auto;
			text-align: center;
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 14px;
			background-color: #e72262;
			color: #fff;
			border:none;
			width:200px;
			padding: 5px;
			-webkit-appearance: none;
			border-radius: 5px;
			display: block;
		}

		.back{
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			left:10px;
			top:-180px;
		}
		.knapp{
			width: 40px;
			cursor: pointer;
		}
		.btn{
			background-color: #e72262;
			border-radius: 50%;
			border:none;
			margin-left: 10px;
			background-image: url(Images/error.png) center center  no-repeat;
			background-size: 100%;
			color:white;
			height:20px;
			width: 20px;
		}
		.tri{
			width:100%;
		}
		
		.drinkside{
			position: relative;
			float:left;
			width:100%;
			text-align: left;
			margin-bottom: 20px;
		}
		
		.iconIMG{
			width: 15px;
			margin: 3px auto;
			text-align: center;
		}

		/***************TEXTFIELDS***************/
		.select{
			width:82%;
			margin:0  5px 0 2px;
			box-sizing: border-box;
			display: block;
			height:30px;
			float:left;
			font-family: 'open sans',helvetica;
			}

		.fieldDrink{
			width:70%;
			margin:0 auto;
			box-sizing: border-box;
			display: block;
			height:40px;
			padding:15px;
			font-size: 30px;
			text-align: center;
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			color:black;
			border:none;
		}
		.receipt{
			width:100%;
			max-width: 350px;
			margin:0 auto;
			box-sizing: border-box;
			display: block;
			height:20px;
			padding:15px;
			padding-bottom:100px;
			font-family: 'open sans',helvetica;
			border-color:#e72262;
			border-style: solid;

		}

		.addDrink{
			width:200px;
			margin:0px auto 0px auto;
			box-sizing: border-box;
			display: block;
			overflow: hidden;
			margin-bottom: -10px;
			text-align: left;
		}

		/***************ADDINGR***************/

		#IngToDrink{
			margin:0;
			padding:0;
			padding-bottom: 40px;
			font-family: 'open sans',helvetica;

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
			top:180px;
			width:70%;
			left:15%;
		}

		.ingredientFromint{
			background-color:black;
			height:150px;
			padding-top: 0;
			margin:-45px 0 0 0;
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
			max-width: 350px;
			background-color: white;
			margin: 0 auto;
		}


		/* MEDIA MIN 600PX */

	@media (min-width: 600px) {
		.c{
			padding-top:250px;
			position:relative;
			max-width: 1100px;
			margin: 0 auto;

		}
		.drinkside{
			overflow: hidden;
			float:left;
			width:50%;
			text-align: left;
			background-color: white;
			margin:0 0 20px 10px;
		}

		#imageside{
			height: 60vh;
			width: 50%;
			float: left; 
			display: inline;
			background-color: white;
			text-align: right;
			margin-bottom: 30px;
		}

		.drinkimagepreview{
			width: 80%;
			max-width: 300px;
			margin:0px auto 20px auto;
			display:inline;
			border: solid 2.5px #e72262 ;
			padding: 10px;
		}

		.allforms{
			width: 40%;
			float: left;
			display: inline;
			margin-top: 30px;
			margin-left: 20px;
			overflow: hidden;
			text-align: left;
			max-width: 500px;
		}

		#white{
			margin-bottom: 40px;
		}
	</style>
</html>