<!Doctype html>
<html>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="main.css" type="text/css" />
			<?php include 'config.php';?>
	</head>
	<body>
		<?php include 'header.php';?>

		<h3> TOP 10 DRINKS </h3>

		<!-- https://www.w3schools.com/w3css/w3css_slideshow.asp 
		The basic to the slideshow is taken from w3schools -->
		<div id="slideshow">

			<img class="mySlides" src="Images/raspberry-mojito.jpg">
			<img class="mySlides" src="Images/cheescake-smoothie.jpg">
			<img class="mySlides" src="Images/passion-mojito.jpg">
				<button class="slidebtn1" onclick="plusDivs(-1)">&#10094;</button>
				<button class="slidebtn2" onclick="plusDivs(+1)">&#10095;</button>
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