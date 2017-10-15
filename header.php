<!DOCTYPE html >
<html>
	<head>
		<title>Min sida</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="jquery.min.js"></script>
		<script>
			$(document).ready( function() {

			var icon = $("#showmenu");
			var menu = $(".nav");

			icon.click( function(event) {
				event.preventDefault();
				menu.toggleClass("open");
			} );

		} );
		</script>

	</head>
	<body>
		<section id= "header">
			<a href="#" id="showmenu"></a>
			<img src="Images/logotype.png" class="logo" >
			
		</section>
		<nav class="nav">
			<ul>
				<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> Home</a></li>
				<li><a class="<?php echo $current_page == 'aboutus.php' ? 'active' : NULL ?>" href="aboutus.php">Find drinks</a></li>
				<li><a class="<?php echo $current_page == 'browsebooks.php' ? 'active' : NULL ?>" href="browsebooks.php">My drinks</a></li>
				<li><a class="<?php echo $current_page == 'mybooks.php' ? 'active' : NULL ?>" href="mybooks.php">Inspo</a></li>
				<li><a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>" href="gallery.php">About us</a></li>
			</ul>
		</nav>
	</body>

	<style>
		body{
			margin:0;
		}

		/* LOGOTYPE */

		.logo{
			padding-top: 10px;
			padding-bottom:10px;
			width:20%;
			max-width: 200px;
			margin-left:40%;
			margin-right:40%;
			display:block;
			z-index: 1;
		}

		/* ACTIVE */

		.active {
			border-bottom:solid 2px white;
			padding:0;
		}
		.active a{
			background-color: rgba(255, 140, 0,0.5);
			padding:0;

		}

		#header{
			background-color:black;
			background-size: 100%;
		}

		/* NAVIGATION */

		.nav{
			text-align: center;
			background-color: black;
			padding:10px;
			z-index: 1;
			overflow: hidden;
		}

		nav ul{
			list-style:none;
			margin:0;
			padding:0;
		}

		.nav li, .nav > ul > li > a {
			font-family: "open sans",sans-serif;
			font-weight: 300;
			text-transform: uppercase;
			padding: 5px;
			padding-bottom:2px;
		}

		.nav a{
			text-decoration:none;
			color:white;
			line-height: 42px;
		}
		a:hover{
			color:#E61262;
		}

		/* Nav hamburger*/
		#showmenu {
			float: left;
			width: 24px;
			padding: 13px 0;
			background: url("Images/menu.png") no-repeat center center;
			z-index: 100;
		}

		.nav {
			clear: both;
			display: none;
		}
		.nav.open {
			display: block;
		}

		@media (min-width: 600px) {
			.nav{
				display:block;
			}
			#showmenu {
				display:none;
			}

			.active {
				border-bottom:solid 2px white;
				padding:0;
			}
			.active a{
				background-color: rgba(255, 140, 0,0.5);
				padding:0;

			}

			#header{
				background-color:black;
				background-size: 100%;
			}

			.nav li, .nav > ul > li > a {
				display:inline;

			}
		}

		/* 470 px
	</style>
</html>





