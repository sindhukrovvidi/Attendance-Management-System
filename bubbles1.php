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
				for ($i = 0; $i < count($tog); $i++) {
				    $sql = "UPDATE `details` SET attendance='A' WHERE Roll_no='$tog[$i]' AND semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname' AND date = '$date' AND period = '$period' AND session = '$session'";
				    $result = $conn->query($sql);
				}
			
				header("Location:registration.php");
			}//2
		}//1
?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Attendance Management System</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet/scss" type="text/css" href="test.scss">


</head>

<body>
<form name='login-submit' class="form" method="post" action="">
	<?php
	include "data.php";
	//$var = "$session"+","+" $period"+","+" $date"+"," +"$sem"+"," +"$batch"+","+" $section"+","+ "$cname";
	$var = "Session = $session\n"+"Period=$period";
	echo '<input type="text" name="name1" readonly="readonly" value="'.$var.'">';
	$sql = "SELECT Roll_no FROM Student WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname'";
	$result = $conn->query($sql);
	?>

  <div class="plane">
  <div class="cockpit">
    <h1>Please Mark the attendance</h1>
  </div>
  <ol class="cabin fuselage">

	
<?php

if ($result->num_rows > 0) {
	$bc=1;
    while($row = $result->fetch_assoc()) {

	$t = $row['Roll_no'];
	echo '<li class="row row--1"><ol class="seats" type="A"><li class="seat"><input type="checkbox" name="toggle[]" id="'.$bc.'" value='.$t.'  /><label for ="'.$bc.'">'.$t.'</label></li></ol></li>';
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
