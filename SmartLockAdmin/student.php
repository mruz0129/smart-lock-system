<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Lock Admin</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta name="keywords" content="Hello World, Lab Tasks" />
    <meta name="description" content="Getting Started Task" />
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link href="css/template02.css" rel="stylesheet" type="text/css" />
    
</head>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="img/swin_logo.png" alt="SUTS_logo" class="hidden-xs hidden-sm">
                        <img src="img/Logo-Swinburne-Sarawak-200.png" alt="SUTS_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li><a href="Admin.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Unit</span></a></li>
                        <li class="active"><a href="student.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Student</span></a></li>
                        <li><a href="accesslog.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Access Log</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                   
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                   
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user.png" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                
                                raspbian            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                    <h1>Panel</h1>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                            
                            
                            <?php
// connect to the database
include('connect.php');

// get the records from the database
if ($result = $conn->query("SELECT * FROM student ORDER BY student_id "))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr>
	<th>Student ID</th>
	<th>Student RFID</th>
	<th>Student First Name</th>
	<th>Student Last Name</th>
	</tr>";

while ($row = $result->fetch_object())
{
	// set up a row for each record
	echo "<tr>";
	echo "<td>" . $row->student_id . "</td>";
	echo "<td>" . $row->student_rfid . "</td>";
	echo "<td>" . $row->first_name . "</td>";
	echo "<td>" . $row->last_name . "</td>";

	echo "<td><a href='student_edit.php?id=" . $row->student_id . "'>Edit</a></td>";
	echo "<td><a href='student_delete.php?id=" . $row->student_id . "'>Delete</a></td>";
	echo "</tr>";
}

echo "</table>";
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
                            <button><a href ='student_create.php'>New</a></button>
                            
                           

                            
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
               
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
