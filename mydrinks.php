<?php include 'config.php';?>
<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="mydrinks.css" type="text/css" />
	</head>
	<body>

		<div id="c"></div> <!-- For the menu -->
		<div id="content">

	

			
			
			<div id="firstc"> <!-- black container starts -->	
				<h1>my favourites</h1>
				<form action="mydrinks.php" method="POST">
					<input type="text" id="name" name="searchname1" placeholder="Search after a drink name"></br>
					<input type="text" class="ing" name="searching1" placeholder="Search after one ingrediens "></br>
					<input class="button" type="submit" name="submit" value="Search">

					<?php
							$searchname1 = "";
							$searching1 = "";

							@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

							if (isset($_POST) && !empty($_POST)) {

								#first trim the search, so no white spaces appear prior to the text entered
				                $searchname1 = trim($_POST['searchname1']);
				                $searching1 = trim($_POST['searching1']);

				            	# Protection form field. 
				            	$searchname1 = mysqli_real_escape_string($db, $searchname1);
				            	$searchname1= htmlentities($searchname1);

				            	$searching1 = mysqli_real_escape_string($db, $searching1);
								$searching1= htmlentities($searching1);
								
				                $searchname1 = addslashes($searchname1);
				            	$searching1 = addslashes($searching1);
				                
				            }
			          

						if ($db->connect_error) {
						    echo "could not connect: " . $db->connect_error;
						    print("<br><a href=index.php>Return to home page </a>");
						    exit();
						}

						# Build the query. Users are allowed to search on title, author, or both
						
						$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Ingredients.IngId, Ingredients.NameIng, Favo.DrinkSaved,members.username FROM Drinks 
							JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
							JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId 
							JOIN Favo ON Favo.DrinkId= Drinks.DrinkId 
							JOIN members ON Favo.username = members.username
							WHERE Drinks.DrinkSaved=1"; // PROBLEME WHEN SEARCHING

						if ($searchname1 && !$searching1) { // Name search only
						    $query = $query . " AND DrinkName like '%" . $searchname1 . "%'GROUP BY DrinkName ";
						};
						if (!$searchname1 && $searching1) { // Ingredients only 
							    $query = $query . " AND NameIng like '%" . $searching1 . "%'";
							};
						if ($searchname1 && $searching1) { // Name and Ingredients search
						    $query = $query . " AND DrinkName like '%" . $searchname1. "%' and NameIng like '%" . $searching1 . "%'"; // unfinished
						};
						if (!$searchname1 && !$searching1) {
    						 $query = $query . " GROUP BY DrinkName";
    					};

					?>
				</form>

			</div>
			
			</div> <!-- blackc ends-->
			
			<div id="intro">
				<img src="Images/tri-3svart.png" class="tri2"> <!-- triangle -->
			<div id="gridsystem">

			<?php 

					  # Here's the query using an associative array for the results
						  $result = $db->query($query);
						  echo "<p> $result->num_rows matching drinks found </p>";
 	

						# Here's the query using bound result parameters
						 

						$stmt = $db->prepare($query);
						$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $IngId, $NameIng, $DrinkSaved,); // Same as the query. 
						$stmt->execute();


							  while ($stmt->fetch()) {


							 	echo "<div class='gridone'>
							 			<ul class='grid'>

							 				<li>
							 					<img src=\"Images/DrinkPictures/" . $DrinkPicture . "\" GROUP BY DrinkPicture>
							 					<div class='caption'>
							 						
							 						<div class='blur'>

							 							<div class='text'><h4><a href='drinkbase.php?DrinkId=$DrinkId'>" . $DrinkName . " </a></h4>
							 							<p class='clicks'>Click to see more</p>
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

		</div> <!-- content div ends -->
		<div id="fotterINC">
		<?php include 'footer.php';?>
		</div>
	</body>
</html>