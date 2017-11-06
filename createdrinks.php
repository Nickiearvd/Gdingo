
<?php include "config.php"; ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
	</head>
	<body>

		<?php
			@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

			if ($db->connect_error) {
				echo "could not connect: " . $db->connect_error;
				print("<br><a href=index.php>Return to home page </a>");
				exit();
			}

			// Get all ingredients 
			$getIng = "SELECT * FROM Ingredients";
			
			$stmt = $db->prepare($getIng);
			$stmt->bind_result($IngId, $NameIng);
			$stmt->execute();


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



			?>

			<form method="post">
				<h2>Add Drink</h2>
				<input type="text" required placeholder="Name" name="DrinkName"></br>

				<ul id="IngToDrink">
				</ul>
				<select id="Ingredients" name="addIng[]">
				<?php 
					while ($stmt->fetch()){
						echo"<option value='".$IngId."'>".$NameIng."</option>";
					}
				?>
				</select>
				<button id="connectDrinkIng" for="addIng">Add Ingredient</button></br>
				<input type="submit" name="addDrink">
			</form>

			<form method="post">
				<h2>Add Ingredients</h2>
				<input type="text" required placeholder="Name" name="NameIng"></br>
				<input type="submit" name="addIng">
			</form>

			<script type="text/javascript" src="addIng.js"></script>



	</body>
</html>