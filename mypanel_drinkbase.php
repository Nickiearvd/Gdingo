<?php include "config.php"; ?>
<?php include "header.php"; ?>
<?php 

	$DrinkId = trim($_GET['DrinkId']); // Get the DrinkId from the finddrinks page the user clicked on.

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		print("<br><a href=index.php>Return to home page </a>");
		exit();
	}


	$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, Drinks.DrinkReceipt, Ingredients.IngId, Ingredients.NameIng
	FROM Drinks 
	JOIN DrinksIng ON Drinks.DrinkId = DrinksIng.DrinkId
	JOIN Ingredients ON Ingredients.IngId = DrinksIng.IngId 
	WHERE Drinks.DrinkId=$DrinkId" ; // Get all the informartion related to the drinkid

	$result = $db->query($query);
	$stmt = $db->prepare($query);
	$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $DrinkReceipt, $IngId, $NameIng); // Same as the query. 
	$stmt->execute();
	$alling=array(); // Create an array in reason to store all the differents ingredients. 

	while ($stmt->fetch()) {
		array_push($alling,$NameIng); // Put the ingredients in the array
	}

							
?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MyDrinks</title>
	</head>
	<body>
		<div class='c'>
			
		<div id="white">
		<h3><?php echo $DrinkName; ?></h3> <!-- Print out the name of the drink-->
				<div id="rating">
						<fieldset id='demo1' class="rating">
	                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
	                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
	                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
	                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
	                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
	                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
	                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
	                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
	                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
	                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
	 
	                    </fieldset>
						<?php include 'rating.php'; ?> 
					</div>
			<div class="drinkside">
				<div class='side'>
		    		<?php 
		    			echo "<img class='drinkimage' src=Images/DrinkPictures/$DrinkPicture>";
		    		?>
	    		</div>
	    		<div class="heart">
					<?php 
						if ($DrinkSaved == 0){ // Show the heart to fav a drink. Heart deisgn depends on if it's already fav or not.
							echo '<a href="AddFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like.png"></a>';
						} 
						else if ($DrinkSaved == 1){
							echo '<a href="RemoveFav.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knapp" src="Images/like2.png"></a>'; 
						} 

					?> 
				</div>

				<div  class="delete">
				<?php echo '<a href="delete.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knappdelete" src="Images/delete.png"></a>'; ?>
				</div>
				<div  class="edit">
					<?php echo '<a href="update.php?DrinkId=' . urlencode($DrinkId) . '"><img class="knappdelete" src="Images/edit.png"></a>'; ?>
				</div>
				<div  class="back">

					<a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
				</div>
				
			
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
		<div id="footerINC">
		<?php include 'footer.php';?>
		</div>
	</body>
	<style>
		.c{

			width:100%;
			background-color: #fff;
			overflow: hidden;
			max-width: 1100px;
			display: block;
			margin: 0 auto 200px auto;
			padding-top: 140px;

				
			}
			#white{
			
				
				max-width: 1100px;
				margin: 0 auto;
				display: block;
				text-align: center;

		}
			/***************TEXT STYLE****************/

			h2{
				font-family: 'open sans',helvetica;
				font-weight: 800;
				text-transform: uppercase;
				font-size: 40px;
				color:black;
				margin:0 auto;
				line-height: 45px;
				margin-bottom: 30px;
				text-align: center;
			}
			#demo1 {
		text-align: center;

	}

	#rating {
		width: 65%;
		overflow: hidden;
	}

	body{
		margin: 0 auto;
	}
	#pageContainer{
		background-color: #000;
		margin: 0 auto;
	}

		#footerINC{
			background-color: #000;
			width: 100%;
		}
		.drinkside{
			position: relative;
			float:left;
			width:100%;
			text-align: center;
			margin-bottom: 20px;
		}
		
		h3{
			font-family: 'open sans',helvetica;
			font-weight: 800;
			text-transform: uppercase;
			font-size: 40px;
			color:black;
			margin:0;
			line-height: 45px;
			margin-bottom: 5px;
			text-align: center;


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
		.back{width: 20px;
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

		.delete {
			background: #E61262;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			padding:10px;
			position:absolute;
			top:65px;
			right: 28px;
			margin: 0;
		}
		.knappdelete{
			width: 20px;
		}
		.edit {
			background: #E61262;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			padding:10px;
			position:absolute;
			margin:0;
			top:120px;
			right: 28px;
		}
		.delete:hover, .edit:hover{
			background-color: black;
		}

		@media (min-width: 600px) {
			.c{
				padding-top: 200px;
			}
			h3{
			margin-top: 45px;
			margin-left:40px;
			width: 100%;
			text-align: center;


		}
		.side{
			float: right;
			text-align: right;
			width: 100%;
		}

		#rating {
		width: 180px;
		text-align: center;
		margin: 0 auto;
		}
		.drinkimage{
			width:80%;

		}
		.heart, .back, .side, .edit, .delete{
			margin-top: 60px;
		}

		.drinkside{
			float:left;
			width:50%;
			text-align: center;
			margin-bottom: 20px;
			display: inline;
			margin: 0px auto 0 auto;

		}

		.heart {
			
			left:20px;
			top:80px;

		}
		.edit{
			left:28px;
			top:140px;
		}

		.delete{
			top: 190px;
			left:28px;
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
				padding-top: 0;
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
				margin-top:50px;
				
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
