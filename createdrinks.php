<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>test</title>

<script src="adding.js"></script>

</head>
<body>

 <?php

$db=mysqli_connect("localhost","root","root","Gd");

if(!$db)
{
die("Connection failed: " . mysqli_connect_error());
}


  if(isset($_POST['save']))
{
   
}

?>
<form action="createdrinks.php" method="post"> 

<label id="first"> The name of the drink:</label><br/>
<input type="text" name="drinkName"><br/><br>

<label id="first">Author</label><br/>
<select id="author1" name="getAuthor[]">
		<?php

			$getAuthor = "SELECT * FROM Drinks";

			$stmt = $db->prepare($getAuthor);
			$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $DrinkReceipt, $DrinkSaved);

			$stmt->execute();

			while ($stmt->fetch()) {
				echo "<option>".$DrinkAuthor."</option>";
			}

		?>

</select><br><br>

<label id="first">Image:</label><br/>
<input type="file" name="drinkPic" accept="image/*">

<br><br>

<label id="first">Recipe</label><br/>
<input type="text" name="drinkRecipe"><br/><br>

<br><ul id="allIng">
		</ul><br>

<label id="first">Ingredients</label><br/>
<select id="ing1" name="getIng">
		<?php

			$getIng = "SELECT * FROM Ingredients";

			$stmt = $db->prepare($getIng);
			$stmt->bind_result($IngId, $NameIng);

			$stmt->execute();

			while ($stmt->fetch()) {
				echo "<option>".$NameIng."</option>";
			}

		?>



</select><br>
<button id="connectDrink" for="getIng">Add Ingredient</button>
<br><br>

<button type="submit" name="save">save</button>

</form>

</body>
</html>