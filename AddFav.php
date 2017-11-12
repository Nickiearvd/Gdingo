<!Doctype html>
<?php require ("includes/config.php"); ?>
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
                        history.back();
                    }
                    setTimeout(redirect, 1000);
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
            $User=($_SESSION['username']);

            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }

            // Prepare an insert statement with the current drinkID and userID and execute it
            $stmt = $db->prepare("INSERT INTO Favo(DrinkId, username) VALUES (?,?)");
            $stmt->bind_param('is', $DrinkId, $User);
            $stmt->execute();
            
            exit;
        ?>
    </body>
</html>








