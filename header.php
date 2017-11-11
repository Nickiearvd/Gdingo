
<!DOCTYPE html >
<html>

	<head>
		<title>Min sida</title>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
		<script type="text/javascript" src="jquery.min.js"></script>
		<script>

			$(document).ready( function() { // Add a open class, enable to show or not the navigation 
				var icon = $("#showmenu");
				var menu = $(".nav");

				icon.click( function(event) {
					event.preventDefault();
					menu.toggleClass("open");
					icon.toggleClass("open");
				} );

			} );
			jQuery(document).ready(function($) { //https://catchthemes.com/support-forum/topic/sticky-header-and-menu-shrink-on-page-scroll/
			    $(window).scroll(function () {
			        if ($(window).scrollTop() > 100) { 
			            $('header').addClass('shrink'); // Add each thing you want to make smaller when scrolling
			            $('#showmenu').addClass('shrink');
			            $('.logo').addClass('shrink');
			            $('.nav').addClass('shrink');
			        }
			        else{
			            $('header').removeClass('shrink');
			            $('#showmenu').removeClass('shrink');
			            $('.logo').removeClass('shrink');
			            $('.nav').removeClass('shrink');
			        }
			    });
			});
		</script>

		


	</head>
	<body>
		<header id= "header">
			<a href="#" id="showmenu"></a>
			<a href="index.php" class='logo'></a>

			<nav class="nav">
				<ul>
					<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> Home</a></li>
					<li><a class="<?php echo $current_page == 'finddrinks.php' ? 'active' : NULL ?>" href="finddrinks.php">Find drinks</a></li>
					<li><a class="<?php echo $current_page == 'mydrinks.php' ? 'active' : NULL ?>" href="mydrinks.php">My favorites</a></li>
					<li><a class="<?php echo $current_page == 'mypanel.php' ? 'active' : NULL ?>" href="memberpage.php">My Drinks</a></li>
					<li><a href="#"><font color="#e72262">
						<?php if (isset($_COOKIE["Active"])) { echo $_COOKIE["Active"];} ?>
							
						</font></a></li>

					

					
					
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
		p{
			font-family: 'open-sans', helvetica;
			font-size: 11px;
		}
		

		/* LOGOTYPE */

		.logo {
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
			float: right;
			width: 40px;
			height:40px;
			padding: 30px 0;
			background: url("Images/menu.png") no-repeat center center;
			background-color: transparent;
			z-index: 100;
			margin-right:20px;
			background-size:80%;
			 transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}
		#showmenu.open{
			background-color: black;
			background: url("Images/menuopen.png") no-repeat center center;
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
		  padding: 13px 0;

		}

		.logo.shrink {
			margin-left: 20px;
			float:left;
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

			body{
				margin: 0 auto;
			}
			.logo{
				margin:auto;
				width: 150px;
				height:150px;
				background-size:100%;
				margin-top: 10px;
			}

			.logo.shrink{
				display: block;
				width: 200px;
				background-size:100%;
				z-index:1;
				margin-left:15px;
			}

			.nav{
				display:block;
			}

			.nav.shrink{
				float:right;
				display:inline;
				z-index:10;
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
				line-height: 15px;
				margin-bottom: 10px;

			}
		}

		/* 470 px
	</style>
</html>





