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

		<!-- https://www.w3schools.com/w3css/w3css_slideshow.asp 
		The basic to the slideshow is taken from w3schools -->
		<div id="content">

			<div id="intro"> <!-- intro starts -->
				<h1>MY DRINKING SHELF</h1>
				
				<form action="mydrinks.php" method="POST">
					<input type="text" id="name" name="searchname" placeholder="Search after a drink name"></br>
					<input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
					<input class="introbtn" type="submit" name="submit" value="Search">

				</form>

			</div> <!-- intro ends -->

			<img src="Images/tri.png" class="tri"> <!-- triangle -->

			<div id="firstc"> <!-- black container starts -->			
				
				<div class="drinkbox">	
				<div class="bildhalva">
					<img class="thumbnail" src="Images/passion-mojito.jpg">
					
				</div>		
				<div class="texthalva">
					<h2>TEQUILA</h2>
					<p class="recept">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
					</p>	
				</div>
				<div class="buttons">
				<div class="error">
					<img class="knapp" src="Images/error.png">
					
				</div>
				<div class="edit">
					<img class="knapp" src="Images/edit.png">
					
				</div>


			</div>
			</div>

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

							$query = " select Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Ingredients.IngId, Ingredients.NameIng, Drinks.DrinkSaved from Drinks 
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
							$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $IngId, $NameIng,$DrinkSaved ); // Same as the query. 
							$stmt->execute();

							echo '<table bgcolor=white cellpadding="6">';
							echo '<tr><b><th>Name</th> <th>Author</th> </b> </tr>';

							while ($stmt->fetch()) {
				        		if($DrinkSaved==1)
				            		$DrinkSaved="Yes";

							    echo "<tr>";
							    echo "<td><a href='drinkbase.php?DrinkId=$DrinkId '> $DrinkName <a> </td><td> $DrinkAuthor </td><td> $Reserved </td> ";
							    
							    echo "</tr>";
							}
							echo "</table>";


						?>
			
						



			</div> <!-- blackc ends-->

			<img src="Images/tri3.png" class="tri2"> <!-- triangle -->
			
			

		</div> <!-- content div ends -->

		<script> 
			
		</script>
		
	</body>
</html>