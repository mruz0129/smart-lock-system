<?php
include("connect.php");

   if(isset($_POST['submit']))
{
	$student_rfid = $_POST['student_rfid'];
    $student_id = $_POST['student_id'];   
	$student_name = $_POST['student_name'];
    $student_type = $_POST['student_type'];
	$student_parents_contact = $_POST['student_parents_contact'];
    $home_address = $_POST['home_address'];
    $school_name = $_POST['school_name'];

    $conn->query("INSERT INTO `student` (`student_rfid`, `student_id`,`student_name`,`student_type`,`student_parents_contact`, `home_address`, `school_name`) VALUES ('$student_rfid', '$student_id', '$student_name', '$student_type', '$student_parents_contact', '$home_address','$school_name')");
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
                    <a href="SLSchart.php"><img src="logo.png"></a>
                                
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
                            <td colspan="2" style="color:#fff;padding-top: 50px;"><h1 style="text-align: center;font-size: 50px;">Register Student</h1>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 175px;">
                                    <form id="register" method = "post">
                                <table border="0" cellpadding="0" style="width:100%;">
                                    <tbody>
                                    <tr>
                                    
                            <td class="registerinfo">Student RFID:</td>
                                 <td style="padding-top:20px;"><input name="student_rfid" type="text" style="width:300px;" required></td>
                            </tr>
                            <tr>
                                <td class="registerinfo">Student ID:</td>
                                <td style="padding-top:20px;"><input name="student_id" type="text" style="width:300px;" required></td>
                            </tr>
        
                             <tr>
                            <td class="registerinfo">Student Name:</td>
                                 <td style="padding-top:20px;"><input name="student_name" type="text" style="width:300px;" required></td>
                                        </tr>
                        
                                        <tr>
                                            <td class="registerinfo">Student Type:</td>
                                            <td style="padding-top:20px;">
                                                <select name="student_type">
                                                    <option value="student">Student</option>
                                                    <option value="primary1">Primary 1</option>
                                                    <option value="primary2">Primary 2</option>
                                                    <option value="primary3">Primary 3</option>
                                                    <option value="primary4">Primary 4</option>
                                                    <option value="primary5">Primary 5</option>
                                                    <option value="primary6">Primary 6</option>
                                                    <option value="secondary1">Secondary 1</option>
                                                    <option value="secondary2">Secondary 2</option>
                                                    <option value="secondary3">Secondary 3</option>
                                                    <option value="secondary4">Secondary 4</option>
                                                    <option value="secondary5">Secondary 5</option>
                                                </select>
                                            </td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">Student Parents Contact:</td>
                                <td style="padding-top:20px;"><input name="student_parents_contact" type="text" style="width:300px;"></td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">Home Address:</td>
                                <td style="padding-top:20px;"><input name="home_address" type="text" style="width:300px;"></td>
                                        </tr>
                                         <tr>
                            <td class="registerinfo">School Name:</td>
                                <td style="padding-top:20px;"><input name="school_name" type="text" style="width:300px;"></td>
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
                                             <button type="submit" name="submit" style="background-color: black;color: white;text-align: center; width:200px;height:50px;">Submit</button></td>
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
    alert("Success Registration");

}
</script>
