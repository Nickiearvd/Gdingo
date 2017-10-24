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

					</div>
					<img src="Images/tri-2svart.png" class="tri"> <!-- triangle -->
					<div class='ingr'>
						<h3>What do you have home</h3>
					    <input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
					    <input class="button" type="submit" name="submit" value="Search">
				    </div>
				    <img src="Images/tri-3svart.png" class="tri"> <!-- triangle -->
				    <?php
		            	$searchname = "";
						$searching = "";
			            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
			            if (isset($_POST) && !empty($_POST)) {
			            # POST data from form

			            	# Protection form field. 
			            	$searchname= htmlentities($searchname);
							$searchname = mysqli_real_escape_string($db, $searchname);

							$searching= htmlentities($searching);
							$searching = mysqli_real_escape_string($db, $searching);
			                
			                #first trim the search, so no white spaces appear prior to the text entered
			                $searchname = trim($_POST['searchname']);
			                $searching = trim($_POST['searching']);
			            }
			                
			                #after that it is wise to use addslashes, it adds slashes if there's an aPOSTrophe or quotation mark
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

							$query = " select * from Drinks";
							if ($searchname && !$searching) { // Title search only
							    $query = $query . " where DrinkName like '%" . $searchname . "%'";
							}
							if (!$searchname && $searching) { // Author search only
							    $query = $query . " where IngId like '%" . $searching . "%'";
							}
							if ($searchname && $searching) { // Title and Author search
							    $query = $query . " where DrinkName like '%" . $searchname . "%' and IngId like '%" . $searching . "%'"; // unfinished
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
							$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $IngId);
							$stmt->execute();
							echo $DrinkId;

							echo '<table bgcolor=white cellpadding="6">';
							echo '<tr><b><th>ID</th><th>Name</th> <th>Author</th> <th>Ing</th></b> </tr>';

							while ($stmt->fetch()) {

							    echo "<tr>";
							    echo "<td> $DrinkId </td><td> $DrinkName </td><td> $DrinkAuthor </td><td> $IngId </td>";
							    
							    echo "</tr>";
							}
							echo "</table>";
			                
			                

			               /* echo '<table cellpadding="10">';
		                	echo '<tr><b><th>Title</th> <th>Author</th> <th>Reserve</th> </b> </tr>';
			                #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
			                if (($id !== FALSE) || ($id2 !== FALSE)) {
			                	$book = $books[$id];
			                    if ($id2 !== FALSE){
			                    	$book = $books[$id2];
			                    }

			                    $title = $book['title'];
			                    $author = $book['author'];
			                    echo "<tr>";
			                    echo "<td> $title </td><td> $author </td>";
			                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
			                    echo "</tr>";
			                }
			                echo "</table>";
			            } 
			            
			            
			            # in this else under, you basically show the book-list.
			            # above you checked in the POST method has been set, if it has display the results of the "search"
			            # if they have not been set, just display the list instead. In this case "book-list" is insufficient
			            # all you have to do is merge book-list.php with book-search.php and create one master page
			            # define the array at the start in PHP and manipulate it later on.
			            
			            else{                
			                echo '<table cellpadding="10">';
		                	echo '<tr><b><th>Title</th> <th>Author</th> <th>Reserve</th> </b> </tr>';
			                foreach ($books as $book) {
			                    $title = $book['title'];
			                    $author = $book['author'];
			                    echo "<tr>";
			                    echo "<td> $title </td><td> $author </td>";
			                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
			                    echo "</tr>";
			                }
			                echo "</table>";*/

			           
		            ?>

		  		</form>
			</div>

		</div>
	</body>
</html>