<!Doctype html>
<?php require ("includes/config.php"); ?>
<?php 
    $DrinkId = trim($_GET['DrinkId']);
    if( $user->is_logged_in() ) {
        if (isset($_COOKIE["currentuser"])) {
            $currentUser = $_COOKIE["currentuser"];
        }
    }
    $Current = json_encode($currentUser);
?>
<html>
    <head>
        <title>Index</title>
            <Meta charset="utf-8"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
            <link rel="stylesheet" href="removeFavorite.css" type="text/css" />
            <script type="text/javascript" src="jquery.min.js"></script>
            <script>
                $(document).ready( function() {
                    function redirect(){
                        history.back(); // History API 
                    }
                    setTimeout(redirect, 1000);
                } );
            </script>
    </head>
    <body>
        <div id="main">
            <div class="animation-target">
                <img id="img" src="Images/checked.png"/>
                <h1>Removed</h1>
            </div>
        </div>
        <?php
            include("config.php");
            $DrinkId = trim($_GET['DrinkId']);
            echo '<INPUT type="hidden" name="drinkid" value=' . $DrinkId . '>';

            $DrinkId = trim($_GET['DrinkId']);  
            $DrinkId = addslashes($DrinkId);

            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }
            $stmt = $db->prepare("DELETE FROM Favo WHERE DrinkId = $DrinkId AND username =  $Current");
            $stmt->execute();
            
            exit;
        ?>


        
    </body>
</html>
                




