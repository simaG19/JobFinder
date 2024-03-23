<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $catagory = mysqli_real_escape_string($conn, $_POST['catagory']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $noemp = mysqli_real_escape_string($conn, $_POST['noemp']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $jobdes = mysqli_real_escape_string($conn, $_POST['jobdes']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $cemail = mysqli_real_escape_string($conn, $_POST['$cemail']);
    $clocation = mysqli_real_escape_string($conn, $_POST['clocation']);
    $exp = mysqli_real_escape_string($conn, $_POST['exp']);
   


         $insert = "INSERT INTO job_form(catagory, title, noemp, salary, deadline, exp, jobdes, sex, cemail, cname, clocation) VALUES('$catagory', '$title', '$noemp', '$salary', '$deadline', '$exp','$jobdes', '$sex', '$cemail', '$cname', '$clocation')";
         mysqli_query($conn, $insert);
         header('location:get_applications.php');

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Post job</title>

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
        <li><a href="get_feedback.php">Feedback</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="get_applications.php">applications</a></li>
      </ul>
    </div>

<!-- header section ends -->

<div class="heading" style="background:url(images/home-hero-background.svg) no-repeat">
   <h1>post job</h1>
</div>
   
<div class="form-container">

   <form action="" method="post">
      <h3>insert job</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="catagory" required placeholder="enter job catagory">
      <input type="text" name="title" required placeholder="enter job title">
      <input type="number" name="noemp" required placeholder="enter no of employee">
      <input type="number" name="salary" required placeholder="salary">
      <input type="date" name="deadline" required placeholder="enter deadline of application">
      <input type="text" name="exp" required placeholder="enter experience needed">
      <input type="text" name="jobdes" required placeholder="enter job description">
      <input type="text" name="sex" required placeholder="prefered sex">
      <input type="text" name="cname" required placeholder="company name">
      <input type="email" name="cemail" required placeholder="company email">
      <input type="text" name="clocation" required placeholder="company location">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already post job ? <a href="get_applications.php?"> see applications</a></p>
     
   </form>

</div>




</body>
</html>