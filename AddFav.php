<!Doctype html>
<html>

    <head>
        <title>Index</title>
            <Meta name="description" content="my page"/>
            <Meta charset="utf-8"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
            <link rel="stylesheet" href="removeFavorite.css" type="text/css" />
            <script type="text/javascript" src="jquery.min.js"></script>
            <script>

                $(document).ready( function() {
                    
                    function redirect(){
                        window.location = "finddrinks.php";
                    }

                    setTimeout(redirect, 2000);

                } );
               
            </script>
    </head>
    <body>

        <div id="main">
            <div class="animation-target">
                <img id="img" src="Images/checked.png"/>
                <h1>ADDED</h1>
            </div>
        </div>

    
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
    
    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Drinks SET DrinkSaved=1 WHERE DrinkId = ?");
    $stmt->bind_param('i', $DrinkId);
    $stmt->execute();
    
    exit;

?>


        
    </body>
</html>








