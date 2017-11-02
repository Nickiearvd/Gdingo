<?php include 'dbConfig';?>


<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">

<title>test</title>


</head>
<body>

 <?php
    if(isset($_POST['save'])){
        $sql = "INSERT INTO test (username, email)
        VALUES ('".$_POST["username"]."','".$_POST["email"]."')";

      $result = mysqli_query($conn,$sql);
    }

    ?>

<form action="createdrinks.php" method="post"> 
<label id="first"> First name:</label><br/>
<input type="text" name="username"><br/>

<label id="first">Email</label><br/>
<input type="text" name="email"><br/>

<label id="first">Age</label><br/>
<input type="text" name="age"><br/>

<button type="submit" name="save">save</button>

</form>

</body>
</html>