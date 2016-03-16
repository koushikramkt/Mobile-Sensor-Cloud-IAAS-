<?php
error_reporting(0);
?>



<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Billing Module</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body> 

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">  
    
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    
    
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Mobile Sensor Cloud
                </a>
            </div>
                       
            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i> 
                        <p>Dashboard</p>
                    </a>            
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i> 
                        <p>User Profile</p>
                    </a>
                </li> 
                <li>
                    <a href="table.php">
                        <i class="pe-7s-note2"></i> 
                        <p>Table List</p>
                    </a>        
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Sensor</p>
                    </a>        
                </li>
                <li class="active">
                    <a href="billing.php">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Billing Details</p>
                    </a>        
                </li>
               
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i> 
                        <p>Maps</p>
                    </a>        
                </li>
                
            </ul> 
    	</div>
    </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">       
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> 
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                Log out
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </nav>
                     
                     
        <div class="content">
            <div class="container-fluid">
                <div class="row">                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sensor Billing Details</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                               <?php
							//   $hostname="localhost";
//$username="root";
//$password="root";
  $hostname="localhost";
$username="root";
$password="root";


$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");

//select db
$selected = mysql_select_db("SensorData",$dbhandle)
  or die("Could not select examples");


$result = mysql_query("SELECT sensor_id, sensor_name, sensor_type, COUNT(sensor_id) FROM sensor_data GROUP BY sensor_id");

echo "<table class=\"table table-hover table-striped\" >";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>Name</td>";
echo "<td>Type</td>";
echo "<td>Cost (in US $ )</td>";

echo "</tr>";
$totalBill=0;
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
	echo "<tr>";
$bill=$row{'COUNT(sensor_id)'}*0.01;
$totalBill=$totalBill+$bill;
   echo "<td>".$row{'sensor_id'}."</td><td>".$row{'sensor_name'}."</td><td>".$row{'sensor_type'}." </td><td> ".$bill." $</td>";
echo "</tr>";
}
echo "<tr><td></td><td colspan='2'>Total Cost</td><td colspan>".$totalBill." $</td></tr>";
echo "</table>";
mysql_close($dbhandle);
							   
							   ?>
                                   
                            </div>
                        </div>
                    </div> 
                    
                                 
                </div>                    
            </div>
        </div>
     
                    
                                 
                </div>                    
            </div>
        </div>
        
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2015 <a href="http://www.creative-tim.com">Cloud Nine</a>
                </p>
            </div>
        </footer>
        
        
    </div>   
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	
</html>


