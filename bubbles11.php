<!DOCTYPE html>
<?php
session_start();
$session = $_SESSION['session'];
$period = $_SESSION['period'];
$date = $_SESSION['date'];
$sem = $_SESSION['semester'];
$batch = $_SESSION['batch'];
$section = $_SESSION['section'];
$cname = $_SESSION['course_code'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{//1
			if (isset($_POST['login-submit'])) 
		  	{//2
				include "data.php";
				$tog = $_POST['toggle'];
				$sql1 = "UPDATE `details` SET attendance='P' WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname' AND date = '$date' AND period = '$period' AND session = '$session'";
				    $result1 = $conn->query($sql1);
				for ($i = 0; $i < count($tog); $i++) {
					echo $tog[$i];				    	
				    $sql = "UPDATE `details` SET attendance='A' WHERE Roll_no='$tog[$i]' AND semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname' AND date = '$date' AND period = '$period' AND session = '$session'";
				    $result = $conn->query($sql);
				}
			}//2
		}//1
?>
<html lang="en" >

<head>


<html lang=en>
 <title>Form</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <link href="a_home.css" rel="stylesheet" type="text/css" media="screen" />

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.2;
}

.w3-bar .w3-button {
    padding: 16px;
}
</style>


  <meta charset="UTF-8">
  <title>Attendance Management System</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet/scss" type="text/css" href="test.scss">


</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="a_home.html" class="w3-bar-item w3-button w3-wide"><i class="fa fa-graduation-cap fa-3x "></i></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="SignUp.php" class="w3-bar-item w3-button"><h5>LOG OUT</h5></a>
      <a href="registration1.php" class="w3-bar-item w3-button"><h5>VIEW ATTENDANCE</h5></a>
       <a href="registration.php" class="w3-bar-item w3-button w3-blue"><h5>EDIT ATTENDANCE</h5></a>
	 <a href="addcourse.php" class="w3-bar-item w3-button"><h5>ADD COURSE</h5></a>
      
      
     
    </div>

		

<!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>


<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="SignUp.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out</a>
 <a href="registration1.php" onclick="w3_close()" class="w3-bar-item w3-button ">View Attendance</a>
       <a href="registration.php"  onclick="w3_close()" class="w3-bar-item w3-button w3-blue">Edit Attendance</a>
	 <a href="addcourse.php"  onclick="w3_close()" class="w3-bar-item w3-button">Add Course</a>
      
  
</nav>


<form name='login-submit' class="form" method="post" action="">
	<?php
	include "data.php";
	$sql = "SELECT * FROM Student WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname'";
	$result = $conn->query($sql);
	$sql1 = "SELECT * FROM details WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname' AND date = '$date' AND period = '$period' AND session = '$session'";
	$result1 = $conn->query($sql1);
	?>

  <div class="plane">
  <div class="cockpit">
    <h1>Please Mark the attendance</h1>
  </div>
  <ol class="cabin fuselage">

	
<?php

if ($result1->num_rows > 0) {
	$bc=1;
    while($row = $result1->fetch_assoc()) {
	$display = 0;
	$t = $row['Roll_no'];
	//echo $t;
	//echo $row['attendance'];
	if($row['attendance'] == 'A'){
		$display = 1;
	}
	 $disable = $display?'checked':"";
	
	echo '<li class="row row--1"><ol class="seats" type="A"><li class="seat"><input type="checkbox" '.$disable.' name="toggle[]" id="'.$bc.'" value='.$t.'  /><label for ="'.$bc.'">'.$t.'</label></li></ol></li>';
	$bc=$bc+1;
    }
}
else {
    echo "0 results";
}

$conn->close();
?>
<input type="submit" name="login-submit" id="login-submit" class="button" value="Submit">
       
      </ol>
    </li>
  </ol>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</ol>
<li>
<ol>

</ol>
</li>
</ol>
</body>

</html>
