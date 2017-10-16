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
					<div class='namedrink'>
						<h3>Search after a drinkname</h3>
						<input type="text" id="name" name="searchname" placeholder="Search after a drink name">
						<input class="button" type="submit" name="submit" value="Search">
					</div>
				    <input type="text" id="ing1" name="searching" placeholder="Search after one ingrediens ">
				    <input type="text" id="ing2" name="searching" placeholder="Search after one ingrediens ">

				    <input class="button" type="submit" name="submit" value="Search">
		  		</form>
			</div>

		</div>
	</body>
</html>