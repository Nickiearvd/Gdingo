<?php include "config.php"; ?>
<?php include "header.php"; ?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyDrinks</title>
		<link rel="stylesheet" href="mypanelStyle.css" type="text/css" />
	</head>
	<body>


		<div class='c'>
			<div id="firstc">
				<h2>My Creations</h2>

				<div  class="back">
					<a href='fileUpload.php?' ><img class="knapp" src="Images/plus.png"></a>
				</div>

			</div>
			<div id="intro">
				<img src='Images/tri.png' class='tri0'>
				<div id="gridsystem">
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
					
					
					while ($stmt->fetch()) {


								 	echo "<div class='gridone'>
								 			<ul class='grid'>

								 				<li>
								 					<img src=\"Images/DrinkPictures/" . $DrinkPicture . "\" GROUP BY DrinkPicture>
								 					<div class='caption'>
								 						
								 						<div class='blur'>

								 							<div class='text'><h4><a href='mypanel_drinkbase.php?DrinkId=$DrinkId'>" . $DrinkName . " </a></h4>
								 							<p class='clicks'>Click to edit</p>
								 							</div>

								 						</div>
								 						<div class='caption-text'></div>
								 						

								 					</div>

								 				</li>
								 			</ul>
								 	

								 	</div>"
								 	;
					
								}



				?>

				</div>
				</div>
					<img src='Images/tri-3svart.png' class='tri2'>;
					</div>

				<div id="fotterINC">	
					<?php include 'footer.php';?>
				</div>	
			
		</div>
	</body>
</html>