<?php include "config.php"; ?>
<?php include "header.php"; ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyDrinks</title>
	</head>
	<body>
		<div class='c'>
			<h2>My Creations</h2>
			<div  class="back">
				<a href='fileUpload.php?' ><img class="knapp" src="Images/plus.png"></a>
			</div>

			<?php 

				@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
				if ($db->connect_error) {
					echo "could not connect: " . $db->connect_error;
					print("<br><a href=index.php>Return to home page </a>");
					exit();
				}
				$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Ingredients.IngId, Ingredients.NameIng, User.Username FROM Drinks 
				JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
				JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId
				JOIN User ON Drinks.DrinkAuthor = User.Username
				WHERE User.Username='Nickie'" ;
				$query = $query . " GROUP BY DrinkName"; // Only show one picture. 

				$result = $db->query($query);
				$stmt = $db->prepare($query);
				$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $IngId, $NameIng, $Username ); // Same as the query. 
				$stmt->execute();
				echo "<img src='Images/tri.png' class='tri'>";
				echo "<div class='grid'>";
				
				while ($stmt->fetch()) { // Show the 

				echo "<div class='gridone'>
				<a href='updatedrink.php?DrinkId=$DrinkId' ><img class='knappedit' src='Images/edit.png'></a>

				<a href='drinkbase.php?DrinkId=$DrinkId'>
				<div class='cut'>
				<img class='DrinkPic' src=\"Images/DrinkPictures/" . $DrinkPicture . "\" GROUP BY DrinkPicture> </div></a>
				<a class='DrinkName' href='drinkbase.php?DrinkId=$DrinkId'>" . $DrinkName . " </a>

				</div>";
				}
				echo "</div>";
				echo "<img src='Images/tri-3svart.png' class='tri2'>";


			?>

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

		.tri{
			width:100%;
			background-color: black;
			margin-top: -20px;
			padding-bottom: 30px;
		}
		.tri2{
			width:100%;
			margin-top: 0px;
			padding-bottom: 30px;
		}

		.DrinkPic{
			
			box-sizing: border-box;
			margin:0 auto;
			position: relative;
		    margin: -50% auto;/* virtualy height needed turn don to zero */
		    width: 100%;/* height will follow within image ratio */
		    height:auto;/* to overrride attribute height set in tag */
		    vertical-align:middle;/* finalise vertical centering on baseline*/
			
		}

		.DrinkPic:hover {
			
		}
		.cut{
			display:block;
		    height:200px;/*set an height */
		    line-height:200px;/* set the baseline at 100px from top*/
		    overflow:hidden;/* crops/cut off */
		}

		.gridone{
		 	position: relative;
		 	width:45%;
		 	display: inline-block;
		 	margin: 5px;
		}

		.grid{
			display: inline-block;
			width:100%;
			margin:0 auto;
			text-align: center;
			background-color: black;
			margin-top: -5px;
			padding-bottom: 40px;
			
		}
		 .DrinkName{ 
		 	float:left;
		 	position:absolute;
		 	left:0;
		 	top:50%;
		 	width:100%;
		 	text-align: center;
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			text-decoration: none;
			color:black;
		 }

		.knapp{
			width: 35px;
			margin:0 auto;
			display: block;
			margin-bottom: 30px;
			background-color: #e72262;
			padding:10px;
			border-radius: 50px;
		}
		.knapp:hover, .knappedit:hover{
			background-color: black;
		}

		.knappedit{
			width: 20px;
			background-color: #e72262;
			padding:10px;
			border-radius: 1px;
			position:absolute;
			left:-5px;
			top:10px;
			z-index: 111111;
		}
	</style>
</html>