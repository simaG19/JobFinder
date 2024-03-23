<?php
 $conn = mysqli_connect('localhost','root','','user_db');
        $sql = "SELECT  catagory, noemp, jobid, salary, deadline, exp, jobdes, sex, cemail, cname, title, clocation FROM job_form ";
        $result = $conn->query($sql);
        
        if(isset($_GET['delete']))
        {  
            
            $userid= $_GET['delete'];

            $query = "DELETE FROM `job_form` WHERE `jobid`= {$userid} ";
            $delete_query= mysqli_query($conn, $query);
            header("Location: delete_job.php");

            
        }elseif(isset($_GET['remove'])){
            $userid= $_GET['remove'];

            $query = "DELETE FROM `feedback_tb` WHERE `fid`= {$userid} ";
            $delete_query= mysqli_query($conn, $query);
            header("Location: view_feedback.php");

        }
        
        $conn->close();
        ?>
        