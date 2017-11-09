<?php include("config.php");?>
<!Doctype html>
<html>

    <head>
        <title>Index</title>
            <Meta name="description" content="my page"/>
            <Meta charset="utf-8"/>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    </head>
    <body>

        <div id="main">
            <div class="animation-target">
                <img id="img" src="Images/checked.png"/>
                <h1>REMOVED</h1>
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
                $stmt = $db->prepare("DELETE FROM Drinks, DrinksIng
USING Drinks INNER JOIN DrinksIng 
WHERE Drinks.DrinkId= $DrinkId
    AND DrinksIng.DrinkId = Drinks.DrinkId");
                $stmt->bind_param('i', $DrinkId);
                $stmt->execute();
                exit;

        ?>

        
    </body>
</html>




