<?php
session_start();
@include 'config.php';

if(isset($_POST['submit'])){
    $aname = mysqli_real_escape_string($conn, $_POST['aname']);
    $aemail = mysqli_real_escape_string($conn, $_POST['aemail']);
    $aaddress = mysqli_real_escape_string($conn, $_POST['aaddress']);
    $jobid = mysqli_real_escape_string($conn, $_POST['jobid']);
  
    

   $pname=$_FILES["file_tu"]["name"];
   $tname=$_FILES["file_tu"]["tmp_name"];

   $uploads_dir='uploads/';
   move_uploaded_file($tname,$uploads_dir.'/'.$pname);
         $insert = "INSERT INTO application_form(aname, aemail, aaddress, jobid, images) VALUES('$aname','$aemail', '$aaddress', $jobid,'$pname') ";
         if(mysqli_query($conn, $insert)){
            echo "s";
         }else{
            echo "eroor";
         }
         
         

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>apply</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<!-- header -->
<div class="nav">
        <h1 class="logo">JOB<span>SITE</span></h1>
        <ul>
        <li><a href="logout.php">logout</a></li>
        
        <li><a href="about.php">About</a></li>
        <li><a href="home.php">Home</a></li>
      </ul>
    </div>

<!-- header section ends -->

<div class="heading" style="background:url(images/home-hero-background.svg) no-repeat;">
   <h1>apply</h1>
</div>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="aname" required placeholder="enter your name">
      <input type="email" name="aemail" required placeholder="enter your email">
      <input type="number" name="jobid" required placeholder="enter job no applying for">
      <input type="text" name="aaddress" required placeholder="enter your address">
      <input type="file" name="file_tu" id="file_tu">
      <input type="submit" name="submit" value="register now" class="form-btn">
      
   </form>
   

</div>

</body>
</html>