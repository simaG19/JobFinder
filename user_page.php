<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<!-- header -->
<div class="nav">
        <h1 class="logo">JOB<span>SITE</span></h1>
        <ul>
        <li><a href="logout.php">logout</a></li>
        <li><a href="view_job.php">view job</a></li>
        
        <li><a href="get_feedback.php">Feedback</a></li>
        <li><a href="home.php">Home</a></li>
        <li><div class="dropdown">
    <button class="logo">Catagory
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      
      <a href="/final/user_page.php?q=category&search=Technology">Technology Jobs</a>
      <a href="/final/user_page.php?q=category&search=Managerial">Managerial Jobs</a>
      <a href="/final/user_page.php?q=category&search=Engineer">Engineer Jobs</a>
      <a href="/final/user_page.php?q=category&search=IT">IT Jobs</a>
      <a href="/final/user_page.php?q=category&search=Civil Engineer">Civil Engineer Jobs</a>
    </div>
  </div></li>
      </ul>
    </div>
    <div class="heading" style="background:url(images/postjob.webp) no-repeat; width:100%">

</div>
</div>

        <form action="" method="GET">
            <div class="input-group mb-3">
               <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="type job" style="height:50px; width:30%; margin-left:10%;  border-radius: 25px;
  border: 5px solid #9FE4E0; margin-bottom:10px ">
               <button type="submit" class="btn btn-primary"style="width:30%; background-color:white;  "><img src="images\magnifier-icon.svg"style=" width:50px"></button>
            </div>
         </form>
   


<div class="cta">
    <div class="wrapper">
        
    <?php 
  
                                    $conn = mysqli_connect('localhost','root','','user_db');
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM job_form WHERE CONCAT(catagory) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                              echo '<div class="col">';
                echo  "<hr>". "   Catagory: " . $row["catagory"]."<br>"."  Number required : " . $row["noemp"]."<br>"." Salary: " . $row["salary"]."<br>"."  Deadline: " . $row["deadline"]."<br>"."  Exprience: " . $row["exp"]."<br>"."  Job Description: " . $row["jobdes"]."<br>"."  Perefered Sex: " . $row["sex"]."<br>"." Company email: " . $row["cemail"]."<br>"."  Company Location: " . $row["clocation"]."<br>"."  Company Name: " . $row["cname"]."<br>"." Row no: " .$row["jobid"] ."<br>". '<a href="application_form.php" class="button-2">Apply</a>' . "<hr>";
                echo '</div>';
                                            }
                                        }
                                        else
                                        {
                                            echo "0 results";
                                        }
                                    }
                                ?>
       
    </div>
</div>

<style>
  .col{
   background-color:whitesmoke;
 } 
hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
  
}
.cta a{
  color:#9FE4E0;
  border:1px solid #9FE4E0;
  background-color:black;
  border-radius: 10px;
  
}
.cta{
   padding: 60px 0;
   
 
   background-color: white;
   color: rgb(0, 0, 0);
}

</style>

<a class="pbtn" href="view_job.php">view all jobs</a> 
<style>.pbtn {
  margin-left:30% ;
  background-color: #9FE4E0;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
}</style>
<!-- footer section starts  -->
<?php
@include 'footer.php';?>
</body>
</html>
