<?php include 'config.php';?>
<?php 

	$DrinkId = trim($_GET['DrinkId']); // Get the DrinkId from the finddrinks page the user clicked on.

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}


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
							
?>

<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>DrinkBase</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
			<Meta charset="utf-8"/>
	</head>
	<body>
		<div class='container'>
			<div class='side'>
	    		<?php 
	    			echo "<img class='drinkimage' src=Images/DrinkPictures/$DrinkPicture>";
	    		?>


    		</div>
    		<div class="heart">
				<?php 
					if ($DrinkSaved == 0){ // Show the heart to fav a drink. Heart deisgn depends on if it's already fav or not.
						echo '<a href="AddFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like.png"></a>';
					} 
					else if ($DrinkSaved == 1){
						echo '<a href="RemoveFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like2.png"></a>'; 
					} 

				?> 
			</div>
			<div  class="back">

				<a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
			</div>
			<div class='maincontent'>
				<h3><?php echo $DrinkName; ?></h3> <!-- Print out the name of the drink-->
				<div class='ingrblack'>
					<img src="Images/tri.png" class="tri"> <!-- triangle -->
					<h4>What do you need? </h4>
					<ul><?php foreach($alling as $value){
		    			echo "<li>" . $value . "</li><br>";} ?> <!-- Print out each value that you can find into the ingredients array -->
		    		</ul>
		    	</div>
		    	<div class='receipt'>
		    		<img src="Images/tri-3svart.png" class="tri"> <!-- triangle -->
			    	<h4>Wonder how to make it? </h4>
		    		<?php echo "<p>" . $DrinkReceipt. "<p>"; ?>
		    	</div>
    		</div>


		</div>
	</body>



	<style>

		.container{
			padding-top:100px;
			overflow: hidden;
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
		h4{
			padding-top:20px;
			font-family: 'open sans',helvetica;
			text-transform: uppercase;
			font-size: 18px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 5px;
			color:#E61262;
			text-align:center;
		}

		.ingrblack{
			background-color:black;
			color:white;
			padding-top: 0px;
		}

		.receipt{
			margin: 0;
		}

		.receipt p{
			margin:20px;
			margin-top:5px;
			font-family: 'open sans',helvetica;
			font-size: 14px;
		}

		.maincontent{
			float:right;
			width:100%;
			margin-left:20px; 
			box-sizing: border-box;
		}
		.side{
			float:left;
			width:100%;
			text-align: center;
			margin-bottom: 20px;
		}
		.drinkimage{
			width:50%;
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
			margin:0;
			padding:0;
		}
		.heart {
			background: white;
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			right:40px;
			top:120px;

		}
		.back{
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			left:20px;
			top:120px;
		}
		.knapp{
			width: 40px;
		}

	</style>
</html>