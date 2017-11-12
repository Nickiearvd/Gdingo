<?php include 'Includes/config.php';?>
<?php include 'config.php';?>

<?php 

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}

$query = "SELECT Rate FROM Rating WHERE DrinkId = 11"; 
$stmt = $db->prepare($query);
	$stmt->bind_result($number); // Same as the query. 
	$stmt->execute();
	$numbers=array(); // Create an array in reason to store all the differents ingredients. 

	while ($stmt->fetch()) {
		array_push($numbers,$number); // Put the ingredients in the array
	};

	//print_r(array_values($numbers));

	foreach ($numbers as $value){
		echo $value. "</br>";
	} 

	$average = array_sum($numbers) / count($numbers);
	echo $average;
?>

