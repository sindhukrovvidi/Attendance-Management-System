<?php
session_start();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{//1
			if (isset($_POST['login-submit1'])) 
		  	{//2
			$fname = $_POST["fname"];
			$cname = $_POST["cname"];
		    	$section = $_POST["section"];
			$batch = $_POST["batch"];
			$sem = $_POST["sem"];
			$username = $_SESSION['username'];
			
			if(empty($username))
			{echo "You need to SignIn";}
			else{
			if (empty($fname)||empty($section)||empty($batch)||empty($cname) || empty($sem))
			{//3
				$message = "Enter all credentials";
				$fErr ="Yes";
			}//3
			else if(!(preg_match("/^[a-zA-Z]*$/",$fname)) || !(preg_match("/^[A-Za-z0-9]+$/",$cname)))
			{//4
				$message = "Enter correct credentials";
				$fErr = "Yes";			
			}//4
			

			if($fErr != "Yes")
			{//5
				include "data.php";
					$sql = "SELECT * FROM `Course` WHERE course_code='$cname' AND semester='$sem' AND batch='$batch' AND section='$section'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {//6
                  					$message = "Course already exists";
                  					$conn->close();
				    		}//6
					//for inserting the new course's details into database.
						else{//7
				       	$sql ="INSERT INTO `Course`(`course_name`, `course_code`, `semester`, `batch`, `section`, `username`) VALUES ('$fname','$cname','$sem','$batch','$section','$username')";
				    			if ($conn->query($sql) === TRUE) {//8
						 	   $message="Course added successfully";
						    	 } //8
							else {//9
						   	   $message="Error: " . $sql . " " . $conn->error;
						     	 }//9
							$conn->close();
				            	    }//7
			}//5
			}
		}//2
	}//1
?>

<!DOCTYPE html>
<html>
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

<body>




<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="a_home.html" class="w3-bar-item w3-button w3-wide"><i class="fa fa-graduation-cap fa-3x "></i></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="SignIn.php" class="w3-bar-item w3-button"><h5>LOG OUT</h5></a>
      <a href="registration1.php" class="w3-bar-item w3-button"><h5>VIEW ATTENDANCE</h5></a>
       <a href="registration.php" class="w3-bar-item w3-button"><h5>MARK ATTENDANCE</h5></a>
	 <a href="addcourse.php" class="w3-bar-item w3-button w3-blue"><h5>ADD COURSE</h5></a>
      
      
     
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
  <a href="SignIn.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out</a>
 <a href="registration1.php" onclick="w3_close()" class="w3-bar-item w3-button">View Attendance</a>
       <a href="registration.php"  onclick="w3_close()" class="w3-bar-item w3-button">Mark Attendance</a>
	 <a href="addcourse.php"  onclick="w3_close()" class="w3-bar-item w3-button w3-blue">Add Course</a>
      
  
</nav>











<title></title>
<meta name="robots" content="noindex, nofollow">
<!-- Include CSS File Here -->
<link rel="stylesheet" href="style1.css"/>
<!-- Include JS File Here -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/registration.js"></script> -->
</head>
<body>

<br>
<br>
<div class="container">
<div class="main">
<form id="login-submit1" class="form" method="post" action="#">


<br>
<label>Course Name :
</br>
<input type="text" name="fname" id="fname" placeholder="name"><br></label>
<label>Course Code :
<input type="text" name="cname" id="cname" placeholder="eg:15CSE313"><br></label>
<label>Semester :
<br>
<select  name="sem" style="width:218px">
<option value=" ">SELECT</option>
<option value="s1">S1</option>
<option value="s2">S2</option>
<option value="s3">S3</option>
<option value="s4">S4</option>
<option value="s5">S5</option>
<option value="s6">S6</option>
<option value="s7">S7</option>
<option value="s8">S8</option>
</select></br>
</br>
<label>Batch :
<br>
<select name="batch" style="width:218px">
<option value=" ">SELECT</option>
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="eee">EEE</option>
<option value="me">ME</option>
</select></br>
</br>
<label>Section :
<br>
<select  name="section" style="width:218px">
<option value=" ">SELECT</option>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select></br>
</br>
<div class="grp">
<input type="submit" name="login-submit" id="login-submit" class="button" value="Add">
</div>
<div id="form-groupmsg">
<label for="remember"><?php echo $message;?></label>
</div>
</form>
</div>


<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->


</body>
</html>
