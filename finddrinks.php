<!Doctype html>
<html>
<?php include 'header.php';?>
	<head>
		<title>Index</title>
			<Meta name="description" content="my page"/>
			<Meta charset="utf-8"/>
			<link rel="stylesheet" href="mainfinddrinks.css" type="text/css" />
			<?php include 'config.php';?>
	</head>
	<body>
		<div class='container'>

			<div class="containersearch">
				<form action="finddrinks.php" method="POST">
				<h3>Search after</br> a drinkname</h3>
					<div class='namedrink'>
			
						<input type="text" id="name" name="searchname" placeholder="Search after a drink name"></br>
						<input class="button" type="submit" name="submit" value="Search">

					</div>
					<img src="Images/tri3-01.png" class="tri"> <!-- triangle -->
					<div class='ingr'>
						<h3>What do you have home</h3>
					    <input type="text" class="ing" name="searching" placeholder="Search after one ingrediens "></br>
					    <input type="text" class="ing" name="searching" placeholder="Search after one ingrediens ">
					     <input class="button" type="submit" name="submit" value="Search">
				    </div>

		  		</form>
			</div>

		</div>
	</body>
</html>