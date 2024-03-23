<?php

@include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update job</title>

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

<div class="heading" style="background:url(images/) no-repeat">
   <h1>update job</h1>
</div>
   
<div class="form-container">

   <form action="" method="post">
      <h3>update</h3>
      <?php

      $userid=$_GET['update'];
      $sql = "SELECT  * FROM job_form  WHERE jobid= {$userid}";
      $result = mysqli_query($conn ,$sql);
      $row = mysqli_fetch_array($result);
      
      if(isset($_POST['submit'])){
    
        $update =  "UPDATE job_form set catagory='" . $_POST['catagory'] . "', title='" . $_POST['title'] . "', noemp='" . $_POST['noemp'] . "', salary='" . $_POST['salary'] . "' ,deadline='" . $_POST['deadline'] . "' ,jobdes='" . $_POST['jobdes'] . "' ,sex='" . $_POST['sex'] . "' ,cname='" . $_POST['cname'] . "' ,cemail='" . $_POST['cemail'] . "' ,clocation='" . $_POST['clocation'] . "' ,exp='" . $_POST['exp'] . "'WHERE jobid='" . $userid. "'";
             mysqli_query($conn, $update);
             header('location:get_applications.php');
    
    };
    
      ?>
      <input type="text" name="catagory" value="<?php echo $row['catagory'];?>" >
      <input type="text" name="title" value="<?php echo $row['title'];?>">
      <input type="number" name="noemp" value="<?php echo $row['noemp'];?>">
      <input type="number" name="salary" value="<?php echo $row['salary'];?>">
      <input type="date" name="deadline" value="<?php echo $row['deadline'];?>">
      <input type="text" name="exp" value="<?php echo $row['exp'];?>">
      <input type="text" name="jobdes" value="<?php echo $row['jobdes'];?>">
      <input type="text" name="sex" value="<?php echo $row['sex'];?>">
      <input type="text" name="cname" value="<?php echo $row['cname'];?>">
      <input type="email" name="cemail" value="<?php echo $row['cemail'];?>">
      <input type="text" name="clocation" value="<?php echo $row['clocation'];?>">
      
      <input type="submit" name="submit" value="update now" class="form-btn">
      <p> <a href="get_applications.php?"> see applications</a></p>
     
   </form>

</div>




</body>
</html>