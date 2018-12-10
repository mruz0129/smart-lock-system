<?php
include("connect.php");

   if(isset($_POST['submit']))
{
	$student_id = $_POST['student_id'];   
	$student_rfid = $_POST['student_rfid'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];

    
    $new=$conn->query("INSERT INTO `student` (`student_id`, `student_rfid`,`first_name`,`last_name` ) VALUES ('$student_id', '$student_rfid', '$first_name', '$last_name')");
    
       if(!$new)
       {
           echo mysqli_error();
       }else
       {
           header("Location: Admin.php");
       }
}
 

?>
<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <h1>
        Edit Record
        </h1>   
        
        <form action="" method = "post">
           <div>
               <strong>Student ID: *</strong><input type="text" name="student_id"/><br/>
               <strong>Student RFID: *</strong><input type="text" name="student_rfid"/><br/>
               <strong>Student First Name: *</strong><input type="text" name="first_name"/><br/>
               <strong>Student Last Name: *</strong><input type="text" name="last_name"/><br/>

               <p>* required</p>
               <input type="submit" name="submit" value="Submit"/>
               </div>
           </form>
        
    
    </body>
</html>