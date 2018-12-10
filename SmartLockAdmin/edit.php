<?php
include("connect.php");
echo $id = $_GET['id'];
$d = $conn->query("SELECT * FROM unit where unit_id='$id'");
$check = mysqli_fetch_array($d);


   if(isset($_POST['submit']))
{
	$unit_start_date = $_POST['unit_start_date'];
	$unit_end_date = $_POST['unit_end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$unit_day = $_POST['unit_day'];
    
    $insert=$conn->query("UPDATE unit SET unit_start_date='$unit_start_date',unit_end_date='$unit_end_date', start_time='$start_time', end_time='$end_time', unit_day='$unit_day' WHERE unit_id='$id'");
    
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
               
               <strong>Unit Start Date: *</strong><input type="date" name="unit_start_date" value="<?php echo $check['unit_start_date'] ?>"/> <br/>
               <strong>Unit End Date: *</strong><input type="date" name="unit_end_date" value="<?php echo $check['unit_end_date'] ?>"/><br/>
		<strong>Start Time: *</strong><input type="time" name="start_time" value="<?php echo $check['start_time'] ?>"/><br/>
		<strong>End Time: *</strong><input type="time" name="end_time" value="<?php echo $check['end_time'] ?>"/><br/>
		<strong>Unit Day: *</strong><input type="text" name="unit_day" value="<?php echo $check['unit_day'] ?>"/>
               <p>* required</p>
               <input type="submit" name="submit" value="Submit"/>
               </div>
           </form>
        
    
    </body>
</html>