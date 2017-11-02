<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">

<title>test</title>


</head>
<body>

 <?php

$conn=mysqli_connect("localhost","root","root","Gd");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

  if(isset($_POST['save']))
{
    $q = "INSERT INTO Drinks (DrinkName, DrinkPicture, DrinkReceipt)
    VALUES ('".$_POST["drinkName"]."','".$_POST["drinkPic"]."','".$_POST["drinkRecipe"]."')";

    $q2 = "INSERT INTO Ingredients (NameIng)
    VALUES ('".$_POST["drinkIng"]."')";

    $result = mysqli_query($conn,$q);
    $result = mysqli_query($conn,$q2);

}

?>

<form action="createdrinks.php" method="post"> 
<label id="first"> The name of the drink:</label><br/>
<input type="text" name="drinkName"><br/>

<label id="first">Image:</label><br/>
<input type="file" name="drinkPic" accept="image/*">

<br><br>

<label id="first">Recipe</label><br/>
<input type="text" name="drinkRecipe"><br/>

<label id="first">Ingredients</label><br/>
<input type="text" name="drinkIng"><br/>

<label id="first">Ingredients</label><br/>
<input type="text" name="drinkIng"><br/>

<label id="first">Ingredients</label><br/>
<input type="text" name="drinkIng"><br/>

<button type="submit" name="save">save</button>

</form>

</body>
</html>