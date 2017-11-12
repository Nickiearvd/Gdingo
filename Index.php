<?php include 'includes/config.php';?>
<?php include 'config.php';?>
<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="main.css" type="text/css" />
	</head>
	<body>



		<div id="c"></div> <!-- For the menu -->


		<!-- https://www.w3schools.com/w3css/w3css_slideshow.asp 
		The basic to the slideshow is taken from w3schools -->
		<div id="content">


			<div id="intro"> <!-- intro starts -->

				<div class="log">

					<?php 
						$str = "<a class='logText' href='logout.php'>Log out</a>";
						$str2 = "<a class='logText' href='login.php'>Log in</a>";
						if($user->is_logged_in())
							{ echo $str;

							}
						else { echo $str2;
						
						}?>
					
				</div>


				<h1>Explore drinks!</h1>

				<div id="pinkline"></div>

				<p class="introp">
					
					Welcome to our page, G'dingo! Here you can look for drinks and recipies, or get inspired to try something new. Our goal is to create a website where you can customise your own library of drinks.

					<br><br>You can save your favorites and create your own drinks. All you have to do is sign up and you will get access to these features. Otherwise you can just scroll through the library!

				

				</p>
				<a href="finddrinks.php"><button class="introbtn"> SEARCH NOW</button></a>
				

			</div> <!-- intro ends -->

			<img src="Images/tri.png" class="tri"> <!-- triangle -->

			<div id="firstc"> <!-- container with about + top starts -->	

					<div class="icons">

		
						<a href="finddrinks.php" class="icon"><img class="iconIMG"  src="Images/search.png" ></a>
						<a href="mydrinks.php" class="icon"><img class="iconIMG" src="Images/like1.png" ></a>
						<a href="memberpage.php" class="icon"><img class="iconIMG" src="Images/plus.png" ></a>
						
					</div>

			</div> <!-- firstc ends-->

			
			
			<div id="gallery"> <!-- gallery div -->
			<img src="Images/tri-3svart.png" class="tri2"> <!-- triangle -->
					<h2>About us</h2>
				<div id="about"> <!-- about us div -->
					<p class="introp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
					Sed elit elit, auctor non sollicitudin ultrices, semper vitae nisi. Proin pharetra erat nisi, in tristique nisl sagittis et. Nullam iaculis imperdiet condimentum. Donec imperdiet commodo aliquam. Vestibulum eleifend est justo, quis lacinia libero blandit at. Aliquam vehicula nisl sed nulla gravida maximus. In suscipit a nulla et suscipit.</p>
				</div>
			</div>
		<?php include 'footer.php';?>
		</div> <!-- content div ends -->

		<script> 
			// Script for slideshow
			var slideIndex = 1; 
			showDivs(slideIndex);

			function plusDivs(n) {
			    showDivs(slideIndex += n);
			}

			function showDivs(n) {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    if (n > x.length) {slideIndex = 1} 
			    if (n < 1) {slideIndex = x.length} ;
			    for (i = 0; i < x.length; i++) {
			        x[i].style.display = "none"; 
			    }
			    x[slideIndex-1].style.display = "block"; 
		}
		</script>
		
	</body>
</html>