<?php include 'config.php';?>

<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="mainfinddrinks.css" type="text/css" />
	</head>
	<body>
		<div class='container'>
		<img src="Images/tri2.png" class="tri1"> <!-- triangle -->
			<div id="whiteborder">
			<div class="containersearch">
			

			
				<form action="finddrinks.php" method="POST">
				
					<div class='namedrink'>
						<div class='fixbackground'>
							<h3>explore</h3>
							<input type="text" id="name" name="searchname" placeholder="Search after a drink name"></br>
							<input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
						    <input class="button" type="submit" name="submit" value="Search">
					    </div>
					     
					     <div id="gridsystem">
						<?php
							$searchname = "";
							$searching = "";

							@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

							if (isset($_POST) && !empty($_POST)) {

								#first trim the search, so no white spaces appear prior to the text entered
				                $searchname = trim($_POST['searchname']);
				                $searching = trim($_POST['searching']);

				            	# Protection form field. 
				            	$searchname = mysqli_real_escape_string($db, $searchname);
				            	$searchname= htmlentities($searchname);

				            	$searching = mysqli_real_escape_string($db, $searching);
								$searching= htmlentities($searching);
								
				                $searchname = addslashes($searchname);
				            	$searching = addslashes($searching);
				                
				            }
				            
							
							if ($db->connect_error) {
							    echo "could not connect: " . $db->connect_error;
							    print("<br><a href=index.php>Return to home page </a>");
							    exit();
							}

							# Build the query. Users are allowed to search on title, author, or both

							$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Ingredients.IngId, Ingredients.NameIng FROM Drinks 
							JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
							JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId" ;

							if ($searchname && !$searching) { // Name search only
							    $query = $query . " where DrinkName like '%" . $searchname . "%'GROUP BY DrinkName ";
							};
							if (!$searchname && $searching) { // Ingredients only 
								    $query = $query . " where NameIng like '%" . $searching . "%'";
							};
							if ($searchname && $searching) { // Name and Ingredients search
							    $query = $query . " where DrinkName like '%" . $searchname. "%' and NameIng like '%" . $searching . "%'"; // unfinished

							};
							 if (!$searchname && !$searching) {
    						 	$query = $query . " GROUP BY DrinkName";

    						};
							  # Here's the query using an associative array for the results
							  $result = $db->query($query);
							  echo "<p> $result->num_rows matching drinks found </p>";
	 

							# Here's the query using bound result parameters

							$stmt = $db->prepare($query);
							$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $IngId, $NameIng); // Same as the query. 
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
					</div>

		  		</form>
		  		</div>
			</div>
		<?php include 'footer.php';?>
		</div>
	</body>
</html>