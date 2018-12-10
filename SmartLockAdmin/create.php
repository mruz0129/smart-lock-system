<?php
include("connect.php");

   if(isset($_POST['submit']))
{
	$unit_id = $_POST['unit_id'];   
	$unit_name = $_POST['unit_name'];
	$unit_start_date = $_POST['unit_start_date'];
	$unit_end_date = $_POST['unit_end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$unit_day = $_POST['unit_day'];

    
    $new=$conn->query("INSERT INTO `unit` (`unit_id`, `unit_name`, `unit_start_date`, `unit_end_date`, `start_time`, `end_time`, `unit_day`) VALUES ('$unit_id', '$unit_name', '$unit_start_date', '$unit_end_date', '$start_time', '$end_time', '$unit_day')");
    
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
               <strong>Unit ID: *</strong><input type="text" name="unit_id"/><br/>
               <strong>Unit Name: *</strong><input type="text" name="unit_name"/><br/>
               <strong>Unit Start Date: *</strong><input type="date" name="unit_start_date"/><br/>
               <strong>Unit End Date: *</strong><input type="date" name="unit_end_date"/><br/>
		<strong>Start Time: *</strong><input type="time" name="start_time"/><br/>
		<strong>End Time: *</strong><input type="time" name="end_time"/><br/>
		<strong>Unit Day: *</strong><input type="text" name="unit_day"/><br/>
               <p>* required</p>
               <input type="submit" name="submit" value="Submit"/>
               </div>
           </form>
        
    
    </body>
</html>