<?php include 'config.php';?>
<?php 

	$DrinkId = trim($_GET['DrinkId']); // Get the DrinkId from the finddrinks page the user clicked on.

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}


	$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Drinks.DrinkReceipt, Ingredients.IngId, Ingredients.NameIng
	FROM Drinks 
	JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
	JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId 
	WHERE Drinks.DrinkId=$DrinkId" ; // Get all the informartion related to the drinkid
	$result = $db->query($query);
	$stmt = $db->prepare($query);
	$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $DrinkReceipt, $IngId, $NameIng); // Same as the query. 
	$stmt->execute();
	$alling=array(); // Create an array in reason to store all the differents ingredients. 

	while ($stmt->fetch()) {
		array_push($alling,$NameIng); // Put the ingredients in the array
	}
							
?>

<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>DrinkBase</title>
			<Meta charset="utf-8"/>
	</head>
	<body>
		<div class='container'>
			<h3><?php echo "" .$DrinkName; ?></h3>

			<ul><?php foreach($alling as $value){
    			echo "<li>" . $value . "</li><br>";} ?>
    		</ul>
    		<?php echo "" .$DrinkReceipt;
    		echo "<img src=/Images/DrinkPictures/mojitop.jpg>";
    		 ?>


		</div>
	</body>




	<style>
		.container{
			padding-top:200px;
		}
		h3{
			font-family: 'open sans',helvetica;
			text-transform: uppercase;
			font-size: 40px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 5px;
			text-align: center;

		}

	</style>
</html>