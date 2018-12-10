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
                        <li class="active"><a href="Admin.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Unit</span></a></li>
                        <li><a href="student.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Student</span></a></li>
                        <li><a href="accesslog.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Acess Log</span></a></li>
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
if ($result = $conn->query("SELECT * FROM unit ORDER BY unit_id "))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr>
	<th>Unit ID</th>
	<th>Unit Name</th>
	<th>Unit Start Date</th>
	<th>Unit End Date</th>
	<th>Start Time</th>
	<th>End Time</th>
	<th>Unit Day</th>
	</tr>";

while ($row = $result->fetch_object())
{
	// set up a row for each record
	echo "<tr>";
	echo "<td>" . $row->unit_id . "</td>";
	echo "<td>" . $row->unit_name . "</td>";
	echo "<td>" . $row->unit_start_date . "</td>";
	echo "<td>" . $row->unit_end_date . "</td>";
	echo "<td>" . $row->start_time . "</td>";
	echo "<td>" . $row->end_time . "</td>";
	echo "<td>" . $row->unit_day . "</td>";   
	echo "<td><a href='edit.php?id=" . $row->unit_id . "'>Edit</a></td>";
	echo "<td><a href='delete.php?id=" . $row->unit_id . "'>Delete</a></td>";
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
                            <button><a href ='create.php'>New</a></button>
                            
                           

                            
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
