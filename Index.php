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

				<h1>Find your favourite drink!</h1>
				<p class="introp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
				Sed elit elit, auctor non sollicitudin ultrices, semper vitae nisi. Proin pharetra erat nisi, in tristique nisl sagittis et. Nullam iaculis imperdiet condimentum. Donec imperdiet commodo aliquam. Vestibulum eleifend est justo, quis lacinia libero blandit at. Aliquam vehicula nisl sed nulla gravida maximus. In suscipit a nulla et suscipit. </p>
				<a href="finddrinks.php"><button class="introbtn"> SEARCH NOW</button></a>
			</div> <!-- intro ends -->

			<img src="Images/tri.png" class="tri"> <!-- triangle -->

			<div id="firstc"> <!-- container with about + top starts -->	

					<div class="icons">

		
						<img class="icon" src="Images/search.png" >
						<img class="icon" src="Images/like1.png" >
						<img class="icon" src="Images/plus.png" >
						<a class="LogIn">LOG IN >></a>
					</div>

			
				<!--<div id="slideshow"> <!-- slideshow -->
					<!--<div class="mySlides"> <!-- first slide -->
						<!--<h3>TOP 10</h3>
						<img class="slideimg" src="Images/raspberry-mojito.jpg">
						<h5>Raspberry fruit Mojito</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus. </p>
					</div>

					<div class="mySlides"> <!-- second slide -->
					<!--<h3>TOP 10</h3>
					<img class="slideimg" src="Images/cheescake-smoothie.jpg">
					<h5>Cheescake smoothie drink</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus.</p>
					</div>

					<div class="mySlides"> <!-- third slide -->
					<!--<h3>TOP 10</h3>
					<img class="slideimg" src="Images/passion-mojito.jpg">
					<h5>Passion fruit Mojito</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus. </p>
					</div>

						<button class="slidebtn1" onclick="plusDivs(-1)">&#10094;</button> <!-- buttons for the slide -->
					<!--<button class="slidebtn2" onclick="plusDivs(+1)">&#10095;</button>

				</div>
				<div id="test"></div> <!-- the green border -->
			</div> <!-- firstc ends-->

			<img src="Images/tri3.png" class="tri2"> <!-- triangle -->
			
			<div id="gallery"> <!-- gallery div -->
					<h2>About<br>us</h2>
				<div id="about"> <!-- about us div -->
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
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