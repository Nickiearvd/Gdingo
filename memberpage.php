<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Members Page';

//include header template

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Member only page - Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></h2>
				<p><a href='logout.php'>Logout</a></p>
				<hr>

		</div>
	</div>


</div>

<?php 
//include header template
require('footer.php'); 
require('layout/end.php');

?>
