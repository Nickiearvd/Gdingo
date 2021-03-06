<?php 
require('includes/config.php'); 
require ('config.php');

$title = 'Members Page'; //define page title

include 'layout/top.php'; //include header template

function redirect() { // Redirect function that we use under
    echo'<script> window.location="login.php"; </script> ';
}

if(!$user->is_logged_in()){ //if not logged in redirect to login page
	redirect();
 }

if( $user->is_logged_in() ) {
		if (isset($_COOKIE["currentuser"])) {
			$currentUser = $_COOKIE["currentuser"];
		}
}

$Current = json_encode($currentUser); // Stringify otherwise dont work in query

?>

<div class='c'>
			<div id="firstc">
				<div class="log">
					<?php 
						$str = "<a class='logText' href='logout.php'>Log out</a>";
						$str2 = "<a class='logText' href='login.php'>Log in</a>";
						if($user->is_logged_in()){ 
								echo $str;
						} else { 
							echo $str2;
						}
					?>
				</div>
				<h2>My Creations</h2>
				<div  class="back"> <!-- To add a new drink --> 
					<a href='fileUpload.php?' ><img class="knapp" src="Images/plus.png"></a>
				</div>

			</div>
			<div id="intro">
				<img src='Images/tri.png' class='tri0'> <!-- Only esthetic--> 
				<div id="gridsystem">
					<?php 
						@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); // Connect to the database
						if ($db->connect_error) { // If it can't connect, redirect to index
							echo "could not connect: " . $db->connect_error;
							print("<br><a href=index.php>Return to home page </a>");
							exit();
						}
		
						$query = " SELECT Drinks.DrinkId, Drinks.DrinkName, Drinks.DrinkAuthor, Drinks.DrinkPicture, members.username FROM Drinks 
						JOIN members ON Drinks.DrinkAuthor = members.username
						WHERE Drinks.DrinkAuthor = $Current" ; // Create query where we get all the informations we need 
						$query = $query . " GROUP BY DrinkName"; // Only show one picture for each drink
						$stmt = $db->prepare($query);
						$stmt->bind_result($DrinkId, $DrinkName, $DrinkAuthor, $DrinkPicture, $username ); // Same as the query. 
						$stmt->execute();
						while ($stmt->fetch()) {
							echo "<div class='gridone'>
									 <ul class='grid'>
									 	<li>
									 		<img src=\"Images/DrinkPictures/" . $DrinkPicture . "\" GROUP BY DrinkPicture>
									 		<div class='caption'>			
									 			<div class='blur'>
									 				<div class='text'><h4><a href='mypanel_drinkbase.php?DrinkId=$DrinkId'>" . $DrinkName . " </a></h4>
									 				<p class='clicks'>Click to edit</p>
									 				</div>
									 			</div>
									 			<div class='caption-text'></div>
									 		</div>
									 	</li>
									</ul>
								</div>";
						}

					?>
				</div>
			</div>
			<img src='Images/tri-3svart.png' class='tri2'>;
</div>
<div id="fotterINC">	
	<?php include "footer.php"; ?>		
</div>	
<style>
.log { 
	display:none;
}
.c{
	padding-top: 150px;
	background-color: white;
}
html{
	background-color: black;
}
/***************TEXT STYLE****************/

h2{
	font-family: 'open sans',helvetica;
	font-weight: 800;
	text-transform: uppercase;
	font-size: 40px;
	color:black;
	margin:0;
	line-height: 45px;
	margin-bottom: 60px;
	text-align: center;
}
h4 a{	
	text-transform: uppercase;
	text-align: center;
	font-size: 20px;
	color: white;
	font-family: 'open sans',helvetica;
	font-weight: 800;
	text-decoration: none;
	float:left;
	position:absolute;
	left:0;
	top:0;
	width:100%;
}

/***************Background color****************/

.tri0{
	width:100%;
	background-color: black;
	padding-bottom: 0px;
	max-width: 1100px;
	margin:0 auto -5px auto;
	display: block;
}
.tri2{
	width:100%;
	max-width: 1100px;
	padding-bottom: 30px;
	margin:0 auto;
	display: block;
}

/***************BUTTONS****************/

.knapp{
	width: 35px;
	margin:-40px auto 25px auto;
	display: block;
	background-color: #e72262;
	padding:10px;
	border-radius: 50px;
	z-index: 1;
}
.knapp:hover{
	background-color: black;
}

/***************FIRST****************/
#firstc{
	background-color: white;
	width: 100%;
	margin: 0 auto;
	padding: 0;
	text-align: center;

}
#intro {
	background-color: #000;
	overflow: hidden;
	text-align: center;
	padding-bottom: 0px;
	margin: 0 auto;
	z-index: 5;
}
#gridsystem{
	max-width: 1100px;
	margin: 0px auto;
	background-color: #000;
	text-align: center;
	padding: 20px 0 50px 0;
}
.gridone{
	position: relative;
	width:350px;
	display: inline-block;
	margin: 5px;
	max-width: 400px;
}
.grid{
	list-style-type: none;
	margin: 0 auto;
	padding: 0px;
	height:280px;/*set an height */
	line-height:280px;/* set the baseline at 100px from top*/
	overflow:hidden;/* crops/cut off */
	text-align: center;
}

.grid li{
	float: left;
	padding: 0px;
	position: relative;
	overflow: hidden;
	position: relative;
}
.grid li:hover .caption{
	opacity: 1;
}
.grid li:hover img{
	opacity: 1;
	transform: scale(1.15,1.15);
	-webkit-transform:scale(1.15,1.15);
	-moz-transform:scale(1.15,1.15);
	-ms-transform:scale(1.15,1.15);
	-o-transform:scale(1.15,1.15);
}
.grid img{
	margin: 0 auto;
	padding: 0px;
	float: left;
	z-index: 4;
	width: 100%;
	text-align: center;
}

.grid .caption{
	cursor: pointer;
	text-align: center;
	position: absolute;
	opacity: 0;
	-webkit-transition:all 0.45s ease-in-out;
	-moz-transition:all 0.45s ease-in-out;
	-o-transition:all 0.45s ease-in-out;
	-ms-transition:all 0.45s ease-in-out;
	transition:all 0.45s ease-in-out;
}
.grid img{
	-webkit-transition:all 0.25s ease-in-out;
	-moz-transition:all 0.25s ease-in-out;
	-o-transition:all 0.25s ease-in-out;
	-ms-transition:all 0.25s ease-in-out;
	transition:all 0.25s ease-in-out;
}
.grid .blur{
	background-color: rgba(0,0,0,0.65);
	height: 280px;
	width: 350px;
	z-index: 5;
	position: absolute;
}
.clicks{
	color: #fff;
}

#footerINC{
	background-color: #000;
	width: 100%;
}

@media (min-width: 600px) {

	.log {
		display: block;
		width: 150px;
		height:50px;
		font-size: 24px;
		-ms-transform: rotate(90deg); /* IE 9 */
	    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
	    transform: rotate(90deg);
	    position: fixed;
	    top:285px;
	    left:-50px;
	    z-index: 10;
	    padding-top: 10px;
	    background-color: #e72262;
	}

	.logText {
		font-size: 24px;
		color:#fff;
	    font-family: 'open sans', helvetica;
	    font-weight: 600;
	    text-decoration: none;
	    text-transform: uppercase;
	}

	.logText:hover {
		color:#000;
	}
	#firstc{
		margin: 90px auto 0 auto;
	}
	h3 {
		font-size: 24px;
	}
	h2{
		margin-bottom: 0px;
	}
	.knapp{
		margin-top: 10px;
	}
}
</style>
		
