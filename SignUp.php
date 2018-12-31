<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if (isset($_POST['register-submit']))
			     {
		    		$username = $_POST["username"];
		    		$email = $_POST["email"];
		    		$password = $_POST["password"];
				$cpassword = $_POST["cpassword"];
		    		//checking name
		    	/*1*/	if (empty($username)) {
				    $message2 = "Name is required";
				    $fErr = "Yes";
				}
				else {
				    // check if name has only letters and whitespace
				    	if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
				      		$message2 = "Name must have Only letters and white space ";
				      		$fErr = "Yes";
				      }
				}
				//checking the email
			/*2*/	if (empty($email)) {
				    $message2 = "Email is required";
				    $fErr = "Yes";
				     }
				else {
				    // check if e-mail address is well-formed
				    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				      $message2 = "Invalid email format";
				      $fErr = "Yes";
					}
				     }
		//checking password
			/*3*/	if (empty($password)) {
				    $message2 = "password is required";
				    $fErr = "Yes";
				   }
				else {
				    // check if password has 1-Lowercase, 1-Uppercase,1-Symbol and a length of 8 to 12
				    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#_$%]{8,12}$/',$password)){
				      $message2 = "Password of min. 8-20 characters and with at least one lowercase char, one uppercase 					                                        char,one digit, one special sign of @#_$% is accepted.";
				      $fErr = "Yes";
					}
				   }

			/*4*/	if (empty($cpassword)) {
				    $message2 = "password cannot be empty";
				    $fErr = "Yes";
				   }
				else {
				    // check if password has 1-Lowercase, 1-Uppercase,1-Symbol and a length of 8 to 12
				    if(!($cpassword===$password)){
				      $message2 = "please enter same passwords";
				      $fErr = "Yes";
					}
				   }


	          	   /*5*/      if($fErr!="Yes")
				      {
					include "data.php";
					$check="SELECT * FROM teacher WHERE username ='$username'";
					$result = $conn->query($check);
					//checking if the username is already there in database.
                  				if ($result->num_rows > 0) {
                  					$message2 = "username already exists";
                  					$conn->close();
				    		}
					//for inserting the new user's details into database.
						else{
				       	$sql ="INSERT INTO `teacher`(`username`,`password`,`email`) VALUES ('$username','$password','$email')";
				    			if ($conn->query($sql) === TRUE) {
						 	   $message2="Account created successfully, Please Login ";
						    	 }
							else {
						   	   $message2="Error: " . $sql . " " . $conn->error;
						     	 }
							$conn->close();
				            	    }
				      }

        		   }

		}
?>
<!DOCTYPE html>
<html lang=en>
 <title>Form</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600' />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <link href="a_home.css" rel="stylesheet" type="text/css" media="screen" />

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
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
      
     
<a href="SignUp.php" class="w3-bar-item w3-button w3-blue"><h5>SIGN UP</h5></a>
     <a href="SignIn.php" class="w3-bar-item w3-button "><h5>SIGN IN</h5></a>  
      
     
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
  <a href="SignIn.php" onclick="w3_close()" class="w3-bar-item w3-button w3-blue">SIGN IN</a>
 	<a href="SignUp.php" onclick="w3_close()" class="w3-bar-item w3-button ">SIGN UP</a>
  
</nav>






<form id="login-form" action=" " method="post" role="form" style="display:block">
  <div class="login-wrap">
	<div class="login-html">
 	<input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label> 
		<div class="login-form">
		<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="username" name="username" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="password" name="password" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="pass" class="label">Confirm Password</label>
						<input id="cpassword" name="cpassword" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="pass" class="label">Email Address</label>
						<input id="email" name="email" type="email" class="input">
					</div>
					<div class="group">
						<input type="submit" name="register-submit" id="register-submit" class="button" value="SignUp">
					</div>
					<div id="form-groupmsg">
						<label for="remember"><?php echo $message2;?></label>
					</div>
					
		  </div>
		</div>
		</div>
	</div>
  
</form>


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
