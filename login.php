<?php
//include config
require('includes/config.php'); 
require ('layout/top.php');
//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: indexlogin.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}
		$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: mypanel.php');
			exit;

		} else {
			$error[] = 'Wrong username or password or your account has not been activated.';
		}
	}else{
		$error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
	}



}//end if submit

//define page title
$title = 'Login';

//include header template
?>

<div class="container">
	<div id="lala">
	<h2>Please Login</h2>
	<img class="knapp" src="Images/arrow.png">
</div>
<div id="form">
<img src="Images/tri.png" class="tri2">
	
	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">

				
				
				
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
				
				
				<hr>
				<div class="row">
					<input type="submit" name="submit" value="Login" class="loginbtn" tabindex="5">
					<a href="indexlogin.php"><input type="button" name="none" value="Register" class="loginbtn" tabindex="5"></a>
				</div>
			</form>
		</div>
	</div>
</div>
	<div id="vit">
<img src="Images/tri-3svart.png" class="tri3">
</div>
</div>

<div id="svart">
<?php 
//include header template
require('layout/end.php'); 
?>
</div>
