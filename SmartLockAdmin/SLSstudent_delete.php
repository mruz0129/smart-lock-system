<?php
include('connect.php');

$id = $_GET['id'];

   if(isset($_GET['id']))
{
    $stmt = $conn->query("DELETE FROM student WHERE student_id='$id'");
    
       if(!$stmt)
       {
           echo mysqli_error();
       }else
       {
           header("Location: SLSstudent.php");
       }
}
 
?>