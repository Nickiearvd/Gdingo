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
				<h3>Search after</br> a drinkname</h3>
					<div class='namedrink'>
			
						<input type="text" id="name" name="searchname" placeholder="Search after a drink name"></br>
						<input class="button" type="submit" name="submit" value="Search">

						<?php
							$searchname = "";
							if (isset($_POST) && !empty($_POST)) {

				            	# Protection form field. 
				            	$searchname= htmlentities($searchname);
								$searchname = mysqli_real_escape_string($db, $searchname);
				                
				                #first trim the search, so no white spaces appear prior to the text entered
				                $searchname = trim($_POST['searchname']);
				            }
				            $searchname = addslashes($searchname);
				            # Open the database
							@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

							if ($db->connect_error) {
							    echo "could not connect: " . $db->connect_error;
							    print("<br><a href=index.php>Return to home page </a>");
							    exit();
							}

							# Build the query. Users are allowed to search on title, author, or both

							$query = " select Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor from Drinks
							JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
							JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId";

							if ($searchname && !$searching) { // Title search only
							    $query = $query . " where DrinkName like '%" . $searchname . "%' GROUP BY DrinkName";
							}
							//echo "Running the query: $query <br/>"; # For debugging
							
							  # Here's the query using an associative array for the results
							  $result = $db->query($query);
							  echo "<p> $result->num_rows matching drinks found </p>";
							  /*echo "<table border=1>";
							  while($row = $result->fetch_assoc()) {
							  echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
							  }
							  echo "</table>";*/
							 

							# Here's the query using bound result parameters
							// echo "we are now using bound result parameters <br/>";

							$stmt = $db->prepare($query);
							$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor);
							$stmt->execute();

							echo '<table bgcolor=white cellpadding="6">';
							echo '<tr><b><th>ID</th><th>Name</th> <th>Author</th> </b> </tr>';

							while ($stmt->fetch()) {

							    echo "<tr>";
							    echo "<td> $DrinkId </td><td><a href='drinkbase.php?DrinkId=$DrinkId'> $DrinkName <a> </td><td> $DrinkAuthor </td>";
							    
							    echo "</tr>";
							}
							echo "</table>";


						?>

					</div>
					<img src="Images/tri-2svart.png" class="tri"> <!-- triangle -->
					<div class='ingr'>
						<h3>What do you have home</h3>
					    <input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
					    <input class="button" type="submit" name="submit" value="Search">
					    <?php
							$searching = "";
				            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
				            if (isset($_POST) && !empty($_POST)) {
				            # POST data from form


								$searching= htmlentities($searching);
								$searching = mysqli_real_escape_string($db, $searching);
				                
				                #first trim the search, so no white spaces appear prior to the text entered
				                $searching = trim($_POST['searching']);
				            }
				                
				                #after that it is wise to use addslashes, it adds slashes if there's an aPOSTrophe or quotation mark
				                
				                $searching = addslashes($searching);
				             	
							$query = " select Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor from Drinks
							JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
							JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId";
				               

								if (!$searchname && $searching) { // Ingredients only 
								    $query = $query . " where NameIng like '%" . $searching . "%'";
								}

								$stmt = $db->prepare($query);
								$stmt->bind_result($IngId, $NameIng);
								$stmt->execute();
								
								$result = $db->query($query);
								echo "<p> $result->num_rows matching drinks found </p>";

								while ($stmt->fetch()) {

								    echo "<tr><td> $IngId</td><td> $NameIng </td></tr>";
					
								}
								echo "</table>";



				                
				                
			            ?>
				    </div>
				    <img src="Images/tri-3svart.png" class="tri"> <!-- triangle -->
				    

		  		</form>
			</div>

		</div>
	</body>
</html>