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
           </head>
           
           <body>
               <div>
                  <?php

                  if(isset($error)){

                    if(empty($error)){

                      echo '<a href="Images/DrinkPictures/' . $_FILES['upload']['name'] . '">Check file';

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
                       <input type="file" name="upload" /></br>
                       <input  type="submit" value="submit" />
                   </form>                   
               </div>
               
               <a class="button" href='createdrinks.php?$DrinkPicture=DrinkPicture'>Continue </a>
<?php echo $DrinkPicture ; ?>
           </body>
    
    
    
    
</html>