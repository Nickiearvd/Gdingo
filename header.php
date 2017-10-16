<!DOCTYPE html >
<html>
	<head>
		<title>Min sida</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="jquery.min.js"></script>
		<script>

			$(document).ready( function() { // Add a open class, enable to show or not the navigation 
				var icon = $("#showmenu");
				var menu = $(".nav");

				icon.click( function(event) {
					event.preventDefault();
					menu.toggleClass("open");
				} );

			} );
			jQuery(document).ready(function($) { //https://catchthemes.com/support-forum/topic/sticky-header-and-menu-shrink-on-page-scroll/
			    $(window).scroll(function () {
			        if ($(window).scrollTop() > 100) { 
			            $('header').addClass('shrink'); // Add each thing you want to make smaller when scrolling
			            $('#showmenu').addClass('shrink');
			            $('.logo').addClass('shrink');
			        }
			        else{
			            $('header').removeClass('shrink');
			            $('#showmenu').removeClass('shrink');
			            $('.logo').removeClass('shrink');
			        }
			    });
			});
		</script>

	</head>
	<body>
		<header id= "header">
			<a href="#" id="showmenu"></a>
			<a href="#" class='logo'></a>

			<nav class="nav">
				<ul>
					<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> Home</a></li>
					<li><a class="<?php echo $current_page == 'finddrinks.php' ? 'active' : NULL ?>" href="finddrinks.php">Find drinks</a></li>
					<li><a class="<?php echo $current_page == 'mydrinks.php' ? 'active' : NULL ?>" href="mydrinks.php">My drinks</a></li>
					<li><a class="<?php echo $current_page == 'mybooks.php' ? 'active' : NULL ?>" href="mybooks.php">Inspo</a></li>
					<li><a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>" href="gallery.php">About us</a></li>
				</ul>
			</nav>
			
		</header>
	</body>

	<style>
		body{
			margin:0;
		}

		header{
			overflow: hidden;
			position:fixed;
			width:100%;
			z-index:1000000000;

		}
		

		/* LOGOTYPE */

		.logo {
			float:right;
			width: 100px;
			height:100px;
			background: url("Images/logotype.png") no-repeat center center;
			background-size:80%;
			margin: 0 auto;
			text-align: center;
			display:block;
			 transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}



		/* ACTIVE **/

		.active {
			border-bottom:solid 2px white;
			padding:0;
		}
		.active a{
			background-color: rgba(255, 140, 0,0.5);
			padding:0;
			border-bottom:solid 2px white;

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
			transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;

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
			width: 60px;
			height:60px;
			padding: 13px 0;
			background: url("Images/menu.png") no-repeat center center;
			background-color: transparent;
			z-index: 100;
			margin-left:10px;
			background-size:80%;
			 transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}

		.nav {
			clear: both;
			display: none;
		}
		.nav.open {
			display: block;
		}

		/************** SHRINK **************/

		header.shrink {
		  position:fixed;
		  clear:both;
		  width:100%;
		  transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}
		#showmenu.shrink {
			width: 30px;
			height:30px;
			z-index: 10000444444400;
		  transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;

		}

		.logo.shrink {
			float:right;
			width: 100px;
			height:50px;
			background: url("Images/logotext.png") no-repeat center center;
			background-size:100%;
			margin-right:10px;
			 transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
	
		}

		/************** MEDIA QUERIES 1 **************/

		@media (min-width: 600px) {

			.logo{
				margin:auto;
			}

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





