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
			<div id="line"></div>

			<div id="footerImg">
				<img class="footerLogo" src="Images/logotext.png" >
				<p class="footerP1">Thank you for visiting, welcome back!</p>
			</div>

			<div id="rightSide">
				<a href="indexlogin.php"><button class="exitbtn"> SIGN UP!</button></a>
			</div>
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
	.tri {
	width:100%;
	background-size: 100%;
	z-index: -1;
	margin-bottom: 40px;
	}
	#footer{
	    clear: both;
	    background:  #000;
	    color: White;
	    padding: 0;
	    text-align: center;
	    vertical-align: middle;
	    line-height: normal;
	    margin: 0 auto;
	    bottom: -10px;
	    width: 100%;
	    max-width: 1100px;
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
		padding-bottom: 15px;
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
		margin: 10px auto 0 auto;
		height: 50px;
	}
	.footerP, .footerP1{
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
				max-width: 290px;
				float: left;
				display: inline;
				margin-top: -140px;
				padding: 0 7% 0px;
			}
			.exitbtn {
				margin-top: -120px;
				width: 100%;			
			}
			.footerP1{
				display: none;
			}
			.links{
				margin-top: 90px;
			}
			#line{
				width: 2px;
				height: 100px;
				background-color: #fff;
				margin: 30px auto;
				overflow: hidden;
			}
			#rightSide{
				margin-top: -98px;
				width: 30%;
				max-width: 290px;
				float: right;
				padding: 0 7%; 
			}
		}
	</style>
</html>
