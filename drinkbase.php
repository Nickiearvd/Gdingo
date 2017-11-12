<?php include 'config.php';?>
<?php include 'Includes/config.php';?>

       
<?php 

	$DrinkId = trim($_GET['DrinkId']); // Get the DrinkId from the finddrinks page the user clicked on.
	if( $user->is_logged_in() ) {
		if (isset($_COOKIE["currentuser"])) {
			$currentUser = $_COOKIE["currentuser"];
		}
	}
	$Current = json_encode($currentUser);

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}

	$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Drinks.DrinkReceipt, Ingredients.IngId, Ingredients.NameIng FROM Drinks 
		JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
		JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId
		WHERE Drinks.DrinkId=$DrinkId"; 


	$result = $db->query($query);
	$stmt = $db->prepare($query);
	$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $DrinkReceipt, $IngId, $NameIng); // Same as the query. 
	$stmt->execute();
	$alling=array(); // Create an array in reason to store all the differents ingredients. 

	while ($stmt->fetch()) {
		array_push($alling,$NameIng); // Put the ingredients in the array
	};



							
?>

<!Doctype html>
<html>

	<head>
		<title>DrinkBase</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
			<Meta charset="utf-8"/>
	</head>
	<body>
	<div id="pageContainer">
	<?php include 'header.php';?>


		<div class='container'>
			<div id="white">

				<div class="drinkside">

					<div class='side'>
			    		<?php 
			    			echo "<img class='drinkimage' src=Images/DrinkPictures/$DrinkPicture>";

			    		?>


		    		</div>
		    		<div class="heart">
						<?php 
							$query = ("SELECT * FROM Favo WHERE DrinkId = $DrinkId AND username = $Current");
							$stmt = $db->prepare($query);
	    					$stmt->bind_result($DrinkId2, $username);
	   						$stmt->execute();

							while($stmt->fetch()) {};

		
							if($DrinkId2 == $DrinkId){
								// SHOW HEART IF THE DRINKID IS IN THE DATABASE IN FAVO TABLE.
								echo '<a href="RemoveFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like2.png"></a>'; 
							}

							
							else {
								echo '<a href="AddFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like.png"></a>';
							} 

						?> 
					</div>
					<div  class="back">

						<a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
					</div>
					<h3><?php echo $DrinkName; ?></h3> <!-- Print out the name of the drink-->
			

	<form name="form" action="" method="post">
  		<input type="checkbox" name="subject1" value="1">
  		<input type="checkbox" name="subject2" value="2">
  		<input type="checkbox" name="subject3" value="3">
  		<input type="checkbox" name="subject4" value="4">
  		<input type="checkbox" name="subject5" value="5">
  		<input type="submit" name="check" >
	</form>
					<?php 
						if(isset($_POST['subject1']) ) {
							$rate=1;
						}
						if(isset($_POST['subject2'])) {
							$rate=2;
						}
						if(isset($_POST['subject3'])) {
							$rate=3;
						}
						if(isset($_POST['subject4'])) {
							$rate=4;
						}
						if(isset($_POST['subject5'])) {
							$rate=5;
						}


				
					
					if (isset($_POST['check']) && !empty($_POST['check'])) {
						$NewRate = $rate;

						 $User=($_SESSION['username']);
						 
							$query = ("SELECT Rating.DrinkId, Rating.username, Rating.Rate FROM Rating WHERE DrinkId = $DrinkId AND username = $Current");
								$stmt = $db->prepare($query);
		    					$stmt->bind_result($DrinkId3, $username, $Rate);
		   						$stmt->execute();

								while($stmt->fetch()) {};

								if($DrinkId3 == $DrinkId){
									echo $NewRate;
									$updateRate = "UPDATE Rating SET Rate='$NewRate' WHERE DrinkId=$DrinkId"; // Insert the values into the database. 
									$stmt = $db->prepare($updateRate);
									$stmt->bind_param('i',$NewRate);
									$stmt->execute(); 

								} else {
									$stmt = $db->prepare("INSERT INTO Rating(DrinkId, username, Rate) VALUES (?,?,?)");
								    $stmt->bind_param('isi', $DrinkId, $User, $rate );
								    $stmt->execute();
								    
								   
								}

						}
					?>

				</div>

				<div class='maincontent'>

					
					<div class='ingrblack'>
						<img src="Images/tri.png" class="tri1"> <!-- triangle -->
						<h4>What do you need? </h4>
						<ul><?php foreach($alling as $value){
			    			echo "<li>" . $value . "</li><br>";} ?> <!-- Print out each value that you can find into the ingredients array -->
			    		</ul>
			    	</div>
			    	<div class='receipt'>
			    		<img src="Images/tri-3svart.png" class="tri0"> <!-- triangle -->
				    	<h4>Wonder how to make it? </h4>
			    		<?php echo "<p>" . $DrinkReceipt. "<p>"; ?>

			    	</div>
	    		</div>
		
			</div>
		</div>
	</div>
	<?php include 'footer.php';?>
	</body>



	<style>

	#demo1 {
		text-align: center;

	}

	#rating {
		width: 65%;
		overflow: hidden;
	}

	body{
		margin: 0 auto;
		background-color: #000;
	}
	#pageContainer{
		background-color: #000;
		margin: 0 auto;
		width: 100%;

	}

		.container{
			padding-top:150px;
			margin: 0 auto;
			text-align: center;
			
			background-color: #fff;
			width: 100%;


		}
		.drinkside{
			position: relative;
			float:left;
			width:100%;
			text-align: center;
			margin-bottom: 20px;
			background-color: #fff;

		}
		#white{
			width:100%;
			background-color: #fff;
			overflow: hidden;
			max-width: 1100px;
			display: block;
			margin: 0 auto;
			

		}
		h3{
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 40px;
			color:black;
			margin:0 auto;
			line-height: 45px;
			margin-bottom: 5px;
			text-align: center;
			width: 60%;


		}
		h4{
			padding-top:20px;
			font-family: 'open sans',helvetica;
			text-transform: uppercase;
			font-size: 18px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 5px;
			color:#E61262;
			text-align:center;
		}

		.ingrblack{
			background-color:black;
			color:white;
			padding-top: 0px;
		}

		.receipt{
			margin: 0;
		}

		.receipt p{
			margin:20px;
			margin-top:5px;
			font-family: 'open sans',helvetica;
			font-size: 14px;
		
		}

		.maincontent{
			float:right;
			width:100%;
			margin-left:20px; 
			box-sizing: border-box;
			background-color: #fff;

		}
		.side{
			margin-top:15px;

		}
		.drinkimage{
			width:60%;

		}
		li{
			font-family: 'open sans',helvetica;
			font-weight: 300;
			list-style: none;
			padding:0;
		}
		ul{
			text-decoration: none;
			margin:0;
			text-align:center;
			padding:0;
		}
		.tri0, .tri1{
			width:100%;
			margin:0;
			padding:0;
		}
		.heart {
			background: white;
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			right:40px;
			top:0px;

		}
		.back{
			width: 20px;
			height: 20px;
			border-radius: 20px;
			padding:8px;
			position:absolute;
			left:20px;
			top:0px;
		}
		.knapp{
			width: 40px;
		}

		@media (min-width: 600px) {


			.heart, .back, .side{
				margin-top: 60px;
			}
			.drinkside{
			float:left;
			width:60%;
			text-align: center;
			margin-bottom: 20px;
			display: inline;
			margin: 0 auto;

			}
			.maincontent{
				float:left;
				width:40%;
				display: inline;
				margin: 0 auto;
				text-align: left;
			
			}
			.tri1, .tri0{
				display: none;
			}
			
				h4{
				
				text-align: left;
				margin-left: 42.5px; 
			}
			.ingrblack ul{
			border-left: 2.5px solid #e72262;
			text-align:left;
			margin-left: 20px;
			padding: 10px 20px;
			
		}
		.ingrblack{
			background-color:white;
			color: #000;
			text-align: left;
			margin-top:70px;
			
		}

		.heart {
			
			left:10px;
			top:70px;

		}
		.back{
			
			left:10px;
		
		}
		.receipt {
			border-left: 2.5px solid #e72262;
			text-align:left;
			margin: 70px 0 0 20px;
			padding: -10px 20px;
		}
		}

	</style>
</html>