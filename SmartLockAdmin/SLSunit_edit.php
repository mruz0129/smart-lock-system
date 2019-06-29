<?php
include("connect.php");
$id = $_GET['id'];
$d = $conn->query("SELECT * FROM unit where unit_id='$id'");
$check = mysqli_fetch_array($d);

   if(isset($_POST['submit']))
{
	$unit_id = $_POST['unit_id'];
    $unit_name = $_POST['unit_name'];   
	$unit_day = $_POST['unit_day'];
    $unit_start_date = $_POST['unit_start_date'];
	$unit_end_date = $_POST['unit_end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
  
    $update=$conn->query("UPDATE unit SET unit_id='$unit_id',unit_name='$unit_name', unit_day='$unit_day', unit_start_date='$unit_start_date', unit_end_date='$unit_end_date', start_time = '$start_time', end_time='$end_time' WHERE unit_id='$id'");
      
        if(!$update)
       {
           echo mysqli_error();
       }else
       {
           header("Location: SLSunit.php");
       }
   }
 
?>

<style type="text/css">
        .navbar{
        font-size: 32px;
        font-weight: 700px;
        font-family: sans-serif;
            color: ;
            text-decoration: none;
        }
        
        a.navbar:link{
        color: white;
        text-decoration: none;
        }
        
        a.navbar:hover{
        color: white;
        text-decoration: none;
        border-bottom: 2px solid red;
        }
        
        a.navbar:visited{
        color: white;
        }
        
        a.navbar:active {
        color: white;
        }
              
        
        .theading{
            font-size: 24px;
            font-weight: 100px;
            font-family: monospace;
            text-align: center;
            background-color: black;
            color: #fff;
        }
    
        
        
         .registerinfo{
             vertical-align: bottom;
             color: white;
             font-size: 18px;
        }
        
        .datainfo{
            text-align: center;
            font-size: 18px;
            
        }
        
        
        
        a.edit:link {
  color: black;
            text-decoration: none;
            text-align: center;
            font-size: 18px;
}

/* visited link */
a.edit:visited {
  color: black;
}

/* mouse over link */
a.edit:hover {
  color: black;
  text-decoration: none;
  border-bottom: 2px solid red;
}

/* selected link */
a.edit:active {
  color: white;
}
    
    a.submit:link {
  color: white;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
}

/* visited link */
a.submit:visited {
  color: white;
}

/* mouse over link */
a.edit:hover {
  color: darkred;
    background-color: firebrick;
  text-decoration: none;
}

/* selected link */
a.edit:active {
  color: black;
}
</style>   



<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="keywords" content="Smart Lock System" />
        <meta name="description" content="Getting Started Task" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>
    
    <body id="body">
        <table border="0" cellpadding="0" style="width:100%; background-color:#000;">
        <tbody>
            <tr>
                <td width="300px" height="168px">
                    <img src="logo.png">
                                
                </td>
            <td width="70%" style="vertical-align: bottom;padding-bottom: 50px;">
               <table border="0" cellpadding="0" style="width:100%;">
                <tbody>
                   <tr>
                  <td><div class="w3-dropdown-hover">
    <button     class="w3-button w3-black" style="width=30">Register</button>
    <div class="w3-dropdown-content w3-bar-block w3-animate-zoom">
      <a href="SLSregister_student.php" class="w3-bar-item w3-button">Student</a>
      <a href="SLSregister_staff.php" class="w3-bar-item w3-button">Staff</a>
                <a href="SLSregister_unit.php" class="w3-bar-item w3-button">Unit</a>
    </div>
  </div>
                       </td>
                    <td><a class="w3-button w3-black" href="SLSstudent.php">Student</a></td>
                    <td><a class="w3-button w3-black" href="SLSstaff.php">Staff</a></td>
                       <td><a class="w3-button w3-black" href="SLSunit.php">Unit</a></td>
                     <td><a class="w3-button w3-black" href="SLSchart.php">Statistic</a></td>
                    </tr>
                    </tbody>
                </table>
            </td>
            </tr>
           
           <tr>    
            <td colspan="2">
              <table border="0" cellpadding="0" style="width:100%;">
                <tbody>
                    <tr>
                        <td width="200px"></td>
                    <td  class="theading" width="960px" style="vertical-align: top">
                        <table border="0" cellpadding="0" style="width:960px;">
                        <tbody>
                            <tr>
                            <td colspan="2" style="color:#fff;padding-top: 50px;"><h1 style="text-align: center;font-size: 50px;">Edit Unit Information</h1>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 175px;">
                                    <form id="register" method = "post">
                                <table border="0" cellpadding="0" style="width:100%;">
                                    <tbody>
                                    
                                    <tr>
                                    <td class="registerinfo">Unit ID:</td>
                                 <td style="padding-top:20px;"><input name="unit_id" type="text" style="width:300px;" value="<?php echo $check['unit_id'] ?>" required></td>
                            </tr>
                            <tr>
                                <td class="registerinfo">Unit Name:</td>
                                <td style="padding-top:20px;"><input name="unit_name" type="text" style="width:300px;" value="<?php echo $check['unit_name'] ?>" required></td>
                            </tr>
        
                             <tr>
                            <td class="registerinfo">Unit Day:</td>
                                 <td style="padding-top:20px;"><input name="unit_day" type="text" style="width:300px;" value="<?php echo $check['unit_day'] ?>" required></td>
                                        </tr>
                            <tr>
                            <td class="registerinfo">Unit Start Date:</td>
                                <td style="padding-top:20px;"><input name="unit_start_date" type="date" style="width:300px;" value="<?php echo $check['unit_start_date'] ?>"></td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">Unit End Date:</td>
                                <td style="padding-top:20px;"><input name="unit_end_date" type="date" style="width:300px;"  value="<?php echo $check['unit_end_date'] ?>"></td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">Unit Start Time:</td>
                                <td style="padding-top:20px;"><input name="start_time" type="time" style="width:300px;" value="<?php echo $check['start_time'] ?>"></td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">Unit End Time:</td>
                                <td style="padding-top:20px;"><input name="end_time" type="time" style="width:300px;" value="<?php echo $check['end_time'] ?>"></td>
                                        </tr>
                                    
                                         <tr>
                            <td height="30px"></td>
                            </tr>
                                       <tr>
                                <td colspan="2" width="960px" style="padding-bottom: 30px;">
                                    <table>
                                    <tbody>
                                        <tr>
                                            
                                <td width="35%"></td>
                            <td width="200px" height="50px">

                                    <button type="submit" name="submit" style="background-color: black;color: white;text-align: center; width:200px;height:50px;" >Submit</button></td>
                                <td width="30%"></td>
                            </tr>
                                        </tbody>
                                    </table>
                            </td>
                            </tr>    
                                        
                                    </tbody>
                                    </table>
                                        </form>
                                </td>
                            </tr>
                         
                            </tbody>
                        </table>
                        </td>
                        <td width="200px" height="554px"></td>
                    </tr>
                   
                    </tbody>
                </table>  
            </td>
               
            </tr>
            </tbody>
        </table>


    </body>
</html>

<script>
document.getElementById('register').addEventListener('submit',submitForm);
    
function submitForm(){
    alert("Successfully updated Unit Information");

}
</script>
