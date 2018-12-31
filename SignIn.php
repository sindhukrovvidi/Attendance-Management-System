<?php
session_start();
?>
<?php

	//if (isset($_SESSION))
		//1*/{
		//header("Location: registration.php");
		//*1*/}

	//else{/*2*/
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{/*3*/
		  //for login using username and password
		 	 if (isset($_POST['login-submit']))
		    	   {/*4*/

		    		$username = $_POST["username"];
		    		$password = $_POST["password"];
		    		if (empty($username))
				{/*5*/
				    $message1 = "Username is required";
				}/*5*/
				elseif (empty($password))
				{/*6*/
				    $message1 = "Password is required";
				}/*6*/
				else
				{/*7*/
					include "data.php";
					$sql = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
					$result = $conn->query($sql);
					if ($result->num_rows == 1 ) {/*8*/
						$row = $result->fetch_assoc();
						$_SESSION['username']=$row["username"];
						$_SESSION['password']=$row["password"];
						header("Location: registration.php");
						exit();
						}/*8*/
					else{/*9*/

						$message1 = "Invalid Username or Password";
					    }/*9*/

			     	  }/*7*/
		            }/*4*/

		}/*3*/
	//}/*2*/
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
      <a href="SignUp.php" class="w3-bar-item w3-button"><h5>SIGN UP</h5></a>
      <a href="SignIn.php" class="w3-bar-item w3-button w3-blue"><h5>SIGN IN</h5></a>
      
      
     
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
  <a href="SignUp.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN UP</a>
	<a href="SignIn.php" onclick="w3_close()" class="w3-bar-item w3-button w3-blue">SIGN IN</a>
 
  
</nav>






  <form id="login-form" action=" " method="post" role="form" style="display:block">
  <div class="login-wrap">
	<div class="login-html">

 	<input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign In</label> 
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
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me signed in</label>
					</div>
					
					<div class="group">
						<input type="submit" name="login-submit" id="login-submit" class="button" value="Sign In">
					</div>
					<div id="form-groupmsg">
						<label for="remember"><?php echo $message1;?></label>
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
