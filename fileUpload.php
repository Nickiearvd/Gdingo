<?php include 'header.php';?>

<?php
  $DrinkPicture = 'default.jpg';
  
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

    } 


  }

?>


<html>
    <head>
        <title>Security - Upload</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
           </head>
           
           <body>

                <div id="container">
                <h2>Upload an Image</h2>
                  <div id="inner">
                    <div  class="back">
                      <a href="#" onClick="history.go(-1);return true;"><img class="knapp" src="Images/left-arrow.png"> BACK</a>
                    </div>
                  
                    <div  class="next">
                      <?php echo '<a href="createdrinks.php?DrinkPicture=' . urlencode($DrinkPicture) . '"><img class="knapp2" src="Images/left-arrow.png"> NEXT</a>';?>
                        
                    </div>
                    <div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="upload"/>

                        <button  class='button' type="submit" value="submit" id="connectDrinkIng" for="addIng">Submit</button></br>

                      </form>                   
                    </div>
                    <div id="image">
                      <?php

                      if(isset($error)){

                        if(empty($error)){

                          echo '<a href="Images/DrinkPictures/' . $_FILES['upload']['name'] . '"><img  class="preView" src="Images/DrinkPictures/'.$DrinkPicture.'">';

                        } else {
              
                               foreach ($error as $err){
                                   echo $err;
                                   echo "</br>";
                               }
                               
                           }

                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div id="footerINC">
                  <?php include 'footer.php';?>
                </div>
           </body>
    
  <style>
    
    body{
      margin: 0 auto;
      background-color: #000;
      text-align: center;

    }
    a{
      text-decoration: none;
      color: #e72262;
    }
    h2{
      font-family: 'open sans',helvetica;
      font-weight: 800;
      text-transform: uppercase;
      font-size: 40px;
      color:black;
      display: block;
      line-height: 45px;
      margin: 80px auto 10px auto;
      text-align: center;
    
    }
    #container{
      background-color: #fff;
      color: #000;
      max-width: 1100px;
      margin: 0px auto 0px auto;
      padding-top: 60px;

    }
    #inner{
      padding: 20px;
      background: white;
    }

    #footerINC{
      background-color: #000;
      width: 100%;
      z-index: 100;
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
      max-width: 300px;
      margin:0px auto 0px auto;
      display:inline;
      border: solid 2.5px #e72262 ;
      padding: 10px;
      text-align: center;
    }
    #image{
      
      width: 100%;
      overflow: hidden; 
      display: block;
      background-color: white;
      text-align: center;
      margin: 0 auto;
      z-index: 0;
    }

    form{
      text-align: center;
      width: 320px;
      margin: 0 auto;
    }

    input[type="file"] {
     
     overflow: hidden;
     display: block;
      font-family: 'open sans',helvetica;
      font-weight: 400;
      text-transform: uppercase;
      font-size: 12px;
      margin: 20px auto;
      text-align: center;
      width: 50%;

    }
   .back, .next{
      width: 40px;
      height: 40px;
      border-radius: 40px;
      padding:8px;
      display: inline;
      font-family: 'open sans',helvetica;
      font-weight: 400;
      text-transform: uppercase;
      font-size: 12px;
      text-decoration: none;
      color: #e72262;
      background-color: #fff;

    }

    .back{
      float: left;

    }

    .next{
      float: right;
    }
    .knapp, .knapp2{
      width: 40px;
    }

    .knapp2{
      -ms-transform: rotate(180deg); /* IE 9 */
      -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
      transform: rotate(180deg);
    }

    .button{
      width:80px;
      margin:0 auto ;
      display: block;
      background-color: #e72262;
      color: #fff;
      border:solid 2px #e72262;
      border-radius: 10px;
      padding: 0;
      height:25px;
      font-size: 10px;
      overflow: hidden;
      cursor: pointer;
      font-family: 'open sans',helvetica;
      font-weight: 400;
      text-transform: uppercase;
      font-size: 12px;
    } 
    


  @media (min-width: 600px) {

     #container{
          
        padding-top: 200px;
      }

      h2{
     
        margin: 20px auto 10px auto;
      }
    
      
    }

  </style>
    
</html>