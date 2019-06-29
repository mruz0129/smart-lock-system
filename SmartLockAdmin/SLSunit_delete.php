<?php
include('connect.php');

$id = $_GET['id'];

   if(isset($_GET['id']))
{
    $stmt = $conn->query("DELETE FROM unit WHERE unit_id='$id'");
    
       if(!$stmt)
       {
           echo mysqli_error();
       }else
       {
           header("Location: SLSunit.php");
       }
}
 
?>