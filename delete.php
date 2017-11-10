<?php include("config.php");?>
<!Doctype html>
<html>

    <head>
        <title>Index</title>
            <Meta name="description" content="my page"/>
            <Meta charset="utf-8"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
            <script type="text/javascript" src="jquery.min.js"></script>
             <link rel="stylesheet" href="removeFavorite.css" type="text/css" />
             <script>

                $(document).ready( function() {
                    
                    function redirect(){
                        window.location = "mypanel.php";
                    }

                    setTimeout(redirect, 1000);

                } );
               
            </script>

    </head>
    <body>

        <div id="main">
            <div class="animation-target">
                <img id="img" src="Images/checked.png"/>
                <h1>Delete</h1>
            </div>
        </div>

    
        <?php


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


                
                // Prepare an Delete statement and execute it
      
                $stmt = $db->prepare("DELETE FROM DrinksIng WHERE DrinkId = $DrinkId;"); // Delete from the middle table
                $stmt->bind_param('i', $DrinkId);
                $stmt->execute();

                $stmt = $db->prepare("DELETE FROM Drinks WHERE DrinkId = $DrinkId;"); // And delete from the drinks table.
                $stmt->bind_param('i', $DrinkId);
                $stmt->execute();

        ?>

        
    </body>
</html>




