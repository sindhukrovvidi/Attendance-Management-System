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
<?php
session_start();
$sem = $_SESSION['semester'];
$batch = $_SESSION['batch'];
$section = $_SESSION['section'];
$session = $_SESSION['session'];
$cname = $_SESSION['course_code'];
include "data.php";

echo "<table border='1' align='center'><tr><th>Date</th><th>Period</th><th>List of Absentees</th></tr>";
$sql = "SELECT DISTINCT date FROM `details` WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND session = '$session' AND course_code = '$cname'";
$result = $conn->query($sql);
if($result->num_rows > 0){
foreach($result as $row){
	$sql1 = "SELECT DISTINCT period FROM `details` WHERE semester = '$sem' AND batch = '$batch' AND section = '$section' AND session = '$session' AND course_code = '$cname' AND date='$row[date]'";
	$result1 = $conn->query($sql1);
	//$row1[] = mysql_fetch_array($result1, MYSQL_ASSOC);
	$num_rows = $result1->num_rows;
	//echo $num_rows;
	$i=0;
	foreach($result1 as $row1){		
		$row1[$i] = $row1['period'];
		$sql2 = "SELECT * FROM `details` WHERE attendance='A' AND semester = '$sem' AND batch = '$batch' AND section = '$section' AND course_code = '$cname'  AND session = '$session' AND date='$row[date]' AND period='$row1[$i]'";
		$result2 = $conn->query($sql2);
		$str = '';
		foreach($result2 as $row2){
			$str = $str . $row2['Roll_no'] . " ";	
		}
		
		echo "<tr>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row1[$i] . "</td>";
		echo "<td>" . $str . "</td>";
		echo "<td><a href=bubbles11.php>Edit</a></td>";
		echo "</tr>";
		//echo $row1[$i];	
		$i++;		
	}  
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
