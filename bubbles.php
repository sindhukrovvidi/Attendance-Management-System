
<?php
session_start();
$sem = $_SESSION['semester'];
$batch = $_SESSION['batch'];
$section = $_SESSION['section'];
$cname = $_SESSION['course_code'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
button1{
background-color : #101010;
}
</style>
<script>
var count=1;

function setColor(btn){
   
    var property = document.getElementById(btn);
    if(count == 0){
        property.style.background-color = "#FFFFFF"
        count  = 1;  
    }
    else{
        property.style.background-color = "#7FFF00"
        count=0;  
    }
}
</script>


</head>
<body>
<?php include "data.php";
$sql = "SELECT Roll_no FROM Student WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname'";
$result = $conn->query($sql);
$var = '';
echo '<input type="text" name="name1" readonly="readonly" value="'.$var.'">';
//echo "<input type='button' id='button' value='Yay' style='color:black'  onclick='setColor('button','#101010')';/>";
if ($result->num_rows > 0) {
    // output data of each row
		$count=1;
    while($row = $result->fetch_assoc()) {
	$t = $row['Roll_no'];
	echo "<input type='button' id='button1' value='$t' style='color:black' onclick='setColor('button1')';/>";
	
    }
} 
else {
    echo "0 results";
}

$conn->close();
?>
<!---<script>
var count=1;
function setColor(btn, color){
	if(count == 0){
		echo "Yay";
		echo "<input style='background-color : pink' value='btn'/>";
		count = 1;
		return count;	
	}
	else{
		echo "Yay";
		echo "<input style='background-color : black' value='btn'/>";
		count = 0;
		return count;
	}
}
</script>--->

<!--<input type="button" id="button" value="$t" style="color:black" onclick="setColor('button','#101010')";/>-->
</body>
</html>

























