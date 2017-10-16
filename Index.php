<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="main.css" type="text/css" />
			<?php include 'config.php';?>
	</head>
	<body>

	<div id="c"></div>

		<!-- https://www.w3schools.com/w3css/w3css_slideshow.asp 
		The basic to the slideshow is taken from w3schools -->
		<div id="content">

			<div id="intro">
				<h1>In search for a drink?</h1>
				<p class="introp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
				Sed elit elit, auctor non sollicitudin ultrices, semper vitae nisi. Proin pharetra erat nisi, in tristique nisl sagittis et. Nullam iaculis imperdiet condimentum. Donec imperdiet commodo aliquam. Vestibulum eleifend est justo, quis lacinia libero blandit at. Aliquam vehicula nisl sed nulla gravida maximus. In suscipit a nulla et suscipit. </p>
				<button class="introbtn"> FIND OUT MORE </button>
			</div>
			<img src="Images/tri.png" class="tri">
			<div id="firstc">
			
				<h2>About<br>us</h2>
				<div id="about">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et maximus augue. Vivamus vel dolor nisi. Quisque molestie scelerisque diam nec semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br><br> Nunc ac mollis orci. Maecenas ac volutpat massa. Nunc et ligula accumsan, condimentum lectus nec, fringilla nisl.
					Sed elit elit, auctor non sollicitudin ultrices, semper vitae nisi. Proin pharetra erat nisi, in tristique nisl sagittis et. Nullam iaculis imperdiet condimentum. Donec imperdiet commodo aliquam. Vestibulum eleifend est justo, quis lacinia libero blandit at. Aliquam vehicula nisl sed nulla gravida maximus. In suscipit a nulla et suscipit. <br> <br>
					Sed elit elit, auctor non sollicitudin ultrices, semper vitae nisi. Proin pharetra erat nisi, in tristique nisl sagittis et. Nullam iaculis imperdiet condimentum. Donec imperdiet commodo aliquam. Vestibulum eleifend est justo, quis lacinia libero blandit at. Aliquam vehicula nisl sed nulla gravida maximus. In suscipit a nulla et suscipit. </p>
				</div>
				<div id="slideshow">
					<div class="mySlides">
						<h3>TOP 10</h3>
						<img class="slideimg" src="Images/raspberry-mojito.jpg">
						<h5>Raspberry fruit Mojito</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus. </p>
					</div>
					<div class="mySlides">
					<h3>TOP 10</h3>
					<img class="slideimg" src="Images/cheescake-smoothie.jpg">
					<h5>Cheescake smoothie drink</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus.</p>
					</div>
					<div class="mySlides">
					<h3>TOP 10</h3>
					<img class="slideimg" src="Images/passion-mojito.jpg">
					<h5>Passion fruit Mojito</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare dignissim nisl a convallis. Fusce ac purus quis sapien mollis blandit vel id velit. Duis eget maximus purus. </p>
					</div>
						<button class="slidebtn1" onclick="plusDivs(-1)">&#10094;</button>
						<button class="slidebtn2" onclick="plusDivs(+1)">&#10095;</button>
				</div>
			</div>
		</div>
		<script>
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