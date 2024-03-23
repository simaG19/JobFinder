<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

<!-- NAVIGATION BAR -->
<header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="list-group">
            <a  class="list-group-item active"> <!-- admin profile -->
      <div class="box-prof">
         <?php
   // Database connection
   $con = mysqli_connect("localhost", "root", "", "data");
   $sql_query = "SELECT * FROM user_form WHERE name='".$_SESSION['admin_name']."'";

   // Fetching image
   $img = mysqli_query($con,$sql_query);
   while ($row = mysqli_fetch_array($img)){
      echo "<img style='width: 100px;height: 100px;border-radius: 20%;' src='img/".$row["img"]."'>";
      echo "<h2 >&nbsp;&nbsp;Name&nbsp;:&nbsp;".$row["name"]."  </h2>";
      echo "<h2 >&nbsp;&nbsp;Email&nbsp;:&nbsp;".$row["email"]."  </h2>";

   }   ?>
         </div>
      <!-- end of profile --></a>
            
            <a href="job_insert.php"class="list-group-item">post job </a>
            <a href="delete_job.php"class="list-group-item">delete job</a>
            <a href="view_job.php"class="list-group-item">view job</a>
            <a href="view_feedback.php"class="list-group-item">view feedback</a>
      

          </div>
        </div>
        <div class="col-md-6">
        <?php
          $sql = "SELECT * FROM job_form ";
          $result = $conn->query($sql);
          if($result !== false && $result->num_rows > 0) {
            echo '<h3>Total Pending Accounts: ' . $result->num_rows . '</h3>'; 
          }
        ?>
          <table class="table">
            <thead>
              <th>SNo</th>
              <th>Catagory</th>
              <th>Title</th>
              <th>number</th>
              <th>salary</th>
              <th>deadline</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM job_form ";
                $result = $conn->query($sql);
                if($result !== false && $result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    $jobid = $row["jobid"];
                    ?>
                      <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $row['catagory']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['noemp']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><?php echo $row['deadline']; ?></td>
                        <td><a href="delete.php?delete=<?php $jobid; ?>">delete</a> </td>
                      </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>  


