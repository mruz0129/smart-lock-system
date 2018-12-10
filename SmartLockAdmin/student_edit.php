<?php
include("connect.php");
echo $id = $_GET['id'];
$d = $conn->query("SELECT * FROM student where student_id='$id'");
$check = mysqli_fetch_array($d);


   if(isset($_POST['submit']))
{
	$student_id = $_POST['student_id'];   
	$student_rfid = $_POST['student_rfid'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
    
    $insert=$conn->query("UPDATE student SET student_id='$student_id',student_rfid='$student_rfid', first_name='$first_name', last_name='$last_name' WHERE student_id='$id'");
    
       if(!$insert)
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
               <strong>Student ID: *</strong><input type="text" name="student_id" value="<?php echo $check['student_id'] ?>"/><br/>
               <strong>Student RFID: *</strong><input type="text" name="student_rfid" value="<?php echo $check['student_rfid'] ?>"/><br/>
               <strong>Student First Name: *</strong><input type="text" name="first_name" value="<?php echo $check['first_name'] ?>"/><br/>
               <strong>Student Last Name: *</strong><input type="text" name="last_name" value="<?php echo $check['last_name'] ?>"/><br/>

               <p>* required</p>
               <input type="submit" name="submit" value="Submit"/>
               </div>
           </form>
        
    
    </body>
</html>