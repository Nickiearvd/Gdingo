<?php

  if (isset($_FILES['upload'])){

    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');

    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));

    $error = array ();

    # Wrong kind of file
    if(in_array($extension, $allowedextensions) === false){
        
        $error[] = 'This is not an image, upload is allowed only for images.';        
    }

    #File too big
    if($_FILES['upload']['size'] > 100000000){
        
        $error[]='The file exceeded the upload limit, max of 10mb';
    }


    if(empty($error)){

      move_uploaded_file($_FILES["upload"]["tmp_name"], "Images/DrinkPictures/{$_FILES["upload"]["name"]}");

      $DrinkPicture = $_FILES["upload"]["name"];

      echo $DrinkPicture;

     // $temp = explode(".", $_FILES["upload"]["name"]);
   // $newfilename ='p';
  //  move_uploaded_file($_FILES["upload"]["tmp_name"], "Images/DrinkPictures/" . $newfilename);

    } 

  }

?>


<html>
    <head>
        <title>Security - Upload</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
           </head>
           <?php include 'header.php';?>
           <body>
               <div id="container">
                 <div>
                 
                    <?php

                    if(isset($error)){

                      if(empty($error)){

                        echo '<a href="Images/DrinkPictures/' . $_FILES['upload']['name'] . '"><img class="preView" src="Images/DrinkPictures/'.$DrinkPicture.'">';

                      } else {
            
                             foreach ($error as $err){
                                 echo $err;
                                 echo "</br>";
                             }
                             
                         }

                    }
                    ?>

                 </div>

                 <div>
                  
                     <form action="" method="POST" enctype="multipart/form-data">

                         <label class="custom-file-upload">
                            <input type="file" name="upload"/>
                              Choose file...
                          </label>
                         <input  type="submit" value="submit" />
                     </form>                   
                 </div>
               
               
               

                </div>

                <img src="Images/tri.png" class="tri">

                 <?php echo '<a class="continue" href="createdrinks.php?DrinkPicture=' . urlencode($DrinkPicture) . '">Continue</a>';?>

                  

                 <div  class="back">

                    <a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"></a>
                  </div>

                   
           </body>
    
  <style>
    
    body{
      margin: 0 auto;
      background-color: #000;
      text-align: center;

    }

    #container{
      background-color: #fff;
      color: #000;
      width: 80%;
      margin: 0px auto 0 auto;
      max-width: 580px;
      padding-top: 120px;
    }

    .tri{
      width: 80%;
      margin: -16px auto 20px auto;
      display: block;
      max-width: 580px;
    }
    .continue{
      color: #fff;
      text-align: center;
      font-family: 'open sans',helvetica;
      font-weight: 800;
      text-transform: uppercase;
      font-size: 30px;
      padding: 20px;
    }
    .preView{
      width: 90%;
      margin: 20px auto;
    }

    input[type=submit], .custom-file-upload  {
      background-color: #e72262;;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 10px auto;
      cursor: pointer;
      text-align: center;
      font-family: 'open sans',helvetica;
      font-weight: 400;
      text-transform: uppercase;
      font-size: 12px;
      display: block;
      width: 160px;


  }
  input[type="file"] {
      display: none;
  }
   .back{
      width: 20px;
      height: 20px;
      border-radius: 20px;
      padding:8px;
      position:absolute;
      left:20px;

      top:200px;
    }
    .knapp{
      width: 40px;
    }
  </style>
    
    
    
</html>