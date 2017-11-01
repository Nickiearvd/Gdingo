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

			<div class="containersearch">
				<form action="finddrinks.php" method="POST">
				<h3>Looking for a drink? </h3>
					<div class='namedrink'>
			
						<input type="text" id="name" name="searchname" placeholder="Search after a drink name"></br>
						<input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
					    <input class="button" type="submit" name="submit" value="Search">

						<?php
							$searchname = "";
							$searching = "";
							if (isset($_POST) && !empty($_POST)) {
				            	# Protection form field. 
				            	$searchname= htmlentities($searchname);
								$searchname = mysqli_real_escape_string($db, $searchname);

								$searching= htmlentities($searching);
								$searching = mysqli_real_escape_string($db, $searching);
				                
				                #first trim the search, so no white spaces appear prior to the text entered
				                $searchname = trim($_POST['searchname']);
				                $searching = trim($_POST['searching']);
				            }
				            $searchname = addslashes($searchname);
				            $searching = addslashes($searching);
				            # Open the database
							@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

							if ($db->connect_error) {
							    echo "could not connect: " . $db->connect_error;
							    print("<br><a href=index.php>Return to home page </a>");
							    exit();
							}

							# Build the query. Users are allowed to search on title, author, or both

							$query = " select Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Ingredients.IngId, Ingredients.NameIng from Drinks 
							JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
							JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId" ;

							if ($searchname && !$searching) { // Name search only
							    $query = $query . " where DrinkName like '%" . $searchname . "%'GROUP BY DrinkName ";
							}
							if (!$searchname && $searching) { // Ingredients only 
								    $query = $query . " where NameIng like '%" . $searching . "%'";
								}
							if ($searchname && $searching) { // Name and Ingredients search
							    $query = $query . " where DrinkName like '%" . $searchname. "%' and NameIng like '%" . $searching . "%'"; // unfinished
							}
							
							  # Here's the query using an associative array for the results
							  $result = $db->query($query);
							  echo "<p> $result->num_rows matching drinks found </p>";
	 

							# Here's the query using bound result parameters

							$stmt = $db->prepare($query);
							$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $IngId, $NameIng); // Same as the query. 
							$stmt->execute();

							echo '<table bgcolor=white cellpadding="6">';
							echo '<tr><b><th>Name</th> <th>Author</th> </b> </tr>';

							while ($stmt->fetch()) {

							    echo "<tr>";
							    echo "<td><a href='drinkbase.php?DrinkId=$DrinkId '> $DrinkName <a> </td><td> $DrinkAuthor </td> ";
							    
							    echo "</tr>";
							}
							echo "</table>";


						?>

					</div>
					<img src="Images/tri-2svart.png" class="tri"> <!-- triangle -->
					<div class='ingr'>
					
	
				    </div>
				    <img src="Images/tri-3svart.png" class="tri"> <!-- triangle -->
				    

		  		</form>
			</div>

		</div>
	</body>
</html>