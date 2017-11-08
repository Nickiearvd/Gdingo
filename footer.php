<!DOCTYPE html >
<html>
	<head>
		<title>Min sida</title>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
		<script type="text/javascript" src="jquery.min.js"></script>

	</head>
	<body>
	<div id="footer">

	<div id="whiteDiv">
		
	</div>
	<img src="Images/tri.png" class="tri"> <!-- triangle -->
	<div id="footerImg">
		<img class="footerLogo" src="Images/logotext.png" >
		<p class="footerP">Thank you for visiting, welcome back!</p>
		
		
		
	</div>

	<a href="finddrinks.php"><button class="exitbtn"> SIGN UP!</button></a>
	<div class="links">
		
	<img class="link" src="Images/facebook.png" >
	<img class="link" src="Images/twitter.png" >
	<img class="link" src="Images/instagram.png" >
	</div>
	<div id="footerCopyrights">
		
		<p class="footerP">Copyright © 2017 All rights reserved by GDingo Company</p>
	</div>
		
	</div>
		
	</body>

	<style>
		
	body{
		margin: 0 auto;

	}

	#footer{
	    clear: both;
	    background:  #000;
	    color: White;
	    padding: 0;
	    text-align: center;
	    vertical-align: middle;
	    line-height: normal;
	    margin: 0;
	    bottom: -10px;
	    width: 100%;
	}

	#whiteDiv{
		background-color: #fff;
		color: #000;
		margin: 0;
		padding:0px;
		width: 100%;
	}
	.footerLogo{
		width: 70%;
		margin: 27px auto -20px auto;
	}
	#footerImg{
		/*border-bottom: solid #fff 2px;*/
		padding-bottom: 15px;
		background-color: #000;
		width: 70%;
		margin: 20px auto 0 auto;
	}
	.links{
		width: 70%
		margin: 0 auto;
	}

	.link{
		width: 50px;
		margin: 0 5px;
		box-sizing: border-box;
	}

	.link:hover{
		opacity: 0.2;
		cursor: pointer;
	}

	#footerCopyrights{
		margin: 10px auto;
		height: 80px;
	}
	.footerP{
		padding-top: 15px;
		font-size: 11px;
	}

	.exitbtn {
		margin: 20px auto 30px auto;
		text-align: center;
		font-family: 'open sans',helvetica;
		font-weight: 800;
		text-transform: uppercase;
		font-size: 20px;
		background-color: #e72262;
		color: #fff;
		border:none;
		width: 220px;
		padding: 10px 25px 10px 25px;

	}
	.exitbtn:hover {
		background-color: #d30d4e;
		cursor: pointer;
	}
		/************** MEDIA QUERIES 1 **************/

		@media (min-width: 600px) {
			#footerImg{
				width: 40%;
				float: left;
				display: inline;
			}
		}
	</style>
</html>
