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
        }
        
        .datainfo{
            text-align: center;
            font-size: 18px;
            padding: 10px;
            
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
  color: red;
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
            
           
           
            </tbody>
        </table>
      
      <script src="app.js"></script>

    </body>
</html>

 <?php
// connect to the database
include('connect.php');


// get the records from the database
if ($result = $conn->query("SELECT * FROM student ORDER BY student_id"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table cellpadding='0' border='#A9A9A9 solid 2px' width='100%'>";

echo "<tr>
	<th class='theading'>Student ID</th>
	<th class='theading'>Student RFID</th>
	<th class='theading'>Student Name</th>
    <th class='theading'>Student Type</th>
    <th class='theading'>Student Parent Contact</th>
    	<th class='theading'>Home Address</th>
        	<th class='theading'>School</th>
    <th class='theading' colspan='2'>Edit</th>
	</tr>";    
    
while ($row = $result->fetch_object())
{
   
	// set up a row for each record
	echo "<tr>";
	echo "<td class='datainfo'>" . $row->student_id . "</td>";
	echo "<td class='datainfo'>" . $row->student_rfid . "</td>";
	echo "<td class='datainfo'>" . $row->student_name . "</td>";
    echo "<td class='datainfo'>" . $row->student_type . "</td>";
    echo "<td class='datainfo'>" . $row->student_parents_contact . "</td>";
    echo "<td class='datainfo'>" . $row->home_address . "</td>";
    	echo "<td class='datainfo'>" . $row->school_name . "</td>";

	echo "<td class='datainfo'><a class='edit' href='SLSstudent_edit.php?id=" . $row->student_id . "'>Edit</a></td>";
	echo "<td class='datainfo'><a class='edit' href='SLSstudent_delete.php?id=" . $row->student_id . "'>Delete</a></td>";
	echo "</tr>";
}

}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

?>
