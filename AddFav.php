
<?php

include("config.php");

$DrinkId = trim($_GET['DrinkId']);
echo '<INPUT type="hidden" name="drinkid" value=' . $DrinkId . '>';

$DrinkId = trim($_GET['DrinkId']);      // From the hidden field
$DrinkId = addslashes($DrinkId);



@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo $DrinkId;
    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Drinks SET DrinkSaved=1 WHERE DrinkId = ?");
    $stmt->bind_param('i', $DrinkId);
    $stmt->execute();
    printf("<br>Added to your favorites!");
    printf("<br><a href=Search.php>Search and Book more Books </a>");
    printf("<br><a href=MyBooks.php>Return to My Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>

