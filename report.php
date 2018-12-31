<!DOCTYPE html>
<html>
<head>
Table
<title> Report </title>
<style>
body{text-align:center;}
</style>
</head>
<body bgcolor=#7FFFD4>


<html lang="en" >


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
       <a href="registration.php" class="w3-bar-item w3-button w3-blue"><h5>MARK ATTENDANCE</h5></a>
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
       <a href="registration.php"  onclick="w3_close()" class="w3-bar-item w3-button w3-blue">Mark Attendance</a>
	 <a href="addcourse.php"  onclick="w3_close()" class="w3-bar-item w3-button">Add Course</a>
      
  
</nav>





<?php
session_start();
$sem = $_SESSION['semester'];
$batch = $_SESSION['batch'];
$section = $_SESSION['section'];
$session = $_SESSION['session'];
$cname = $_SESSION['course_code'];
include "data.php";
$sql = "SELECT * FROM `details` WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND session = '$session' AND course_code = '$cname'";
$result = $conn->query($sql);

/*student table doesnot have the column attendance*/

$sql1 = "SELECT * FROM `details` WHERE attendance='A' AND semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname'  AND session = '$session'";
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()){
			$str = $str . $row1['Roll_no'] . " ";	
		}    
      
/*$Absentees = array();
while($row1 = $result1->fetch_assoc()){
	$Absentees[] = $row1['Roll_no'];
}
print_r($Absentees);*/
echo "<table border='1' align='center'><tr><th>Date</th><th>Semester</th><th>Batch</th><th>Section</th><th>Period</th><th>Session</th><th>Course Code</th><th>List of Absentees</th></tr>";
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		  echo "<tr>";
		  echo "<td>" . $row['date'] . "</td>";
		  echo "<td>" . $row['semester'] . "</td>";
	 	  echo "<td>" . $row['batch'] . "</td>";
		  echo "<td>" . $row['section'] . "</td>";
		  echo "<td>" . $row['period'] . "</td>";
		  echo "<td>" . $row['session'] . "</td>";
		  echo "<td>" . $row['course_code'] . "</td>";  
		  echo "<td>" . $str . "</td>";
		echo"</tr>";
	}
echo "</table>";
}
else{
	echo "0 results";
}
$conn->close();
?>
</body>
</html>
