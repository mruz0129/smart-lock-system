<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "smartlockdb";



// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//initialize variables
$entry = '';
$date = '';


$sql = "SELECT COUNT(1) AS access_entries, DATE(access_time) as access_date
FROM accesslog
GROUP BY DATE(access_time)";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
{
   $entry = $entry . '"'. $row['access_entries'].'",';
   $date = $date . '"'. $row['access_date'] .'",';
}


$entry = trim($entry,",");
$date = trim($date,",");


?>


<script>
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script>

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
        <meta name="description" content="Smart Lock System" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>
    
    <body id="body" onload="startTime()">

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
            <td style="padding-left:70px;"> <div id="date" style="color:#fff;"></div></td>
            </tr>
            <tr>
            <td style="padding-left:70px;"> <div id="clock" style="color:#fff;"></div></td>
            </tr>
            <tr>
            <td colspan="2">
              <table border="0" cellpadding="0" style="width:100%;">
                <tbody>
                    <tr>
                        <td width="20%"></td>
                                                    <td width="200px" height="50px">
                                             <button onclick="location.href='SLSaccesslog.php'" type="submit" name="submit" style="background-color: black;color: white;text-align: center; width:200px;height:50px;">Access Log</button></td>
                         <td width="20%"></td>
                        
                    </tr>
                  <tr>
                      <td width="20%"></td>
                    <td><div class="chart-container" style="position: relative; height:200px; width:100%">
                      <canvas id="myChart"></canvas>
                        </div>
                      </td>
                      <td width="20%"></td>
                    </tr>
                    <tr>
                    <td width="200px" height="300px"></td>
                    </tr>
                  </tbody>
                </table>
                
            </td>
            </tr>
            </tbody>
        </table>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    </body>
</html>


<script>
				var ctx = document.getElementById("myChart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $date; ?>],
		            datasets: 
		            [{
		                label: 'Number of access',
		                data: [<?php echo $entry; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip : true, ticks:{fontColor:'white'}, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#fff', fontSize: 16}}
		        }
		    });
			</script>

