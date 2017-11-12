<?php include 'Includes/config.php';?>
<?php include 'config.php';?>

<?php 


@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}

$avg = "SELECT Rate
	FROM Rating";
	$stmt = $db->prepare($avg);
	$stmt->bind_result($avg1);
	$stmt->execute();
	echo $avg1;
?>