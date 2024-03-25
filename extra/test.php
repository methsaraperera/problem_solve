<!DOCTYPE html>
<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $studentNo = $_POST["studentNo"];
 $sql1 = "SELECT studentNo, name, sex, age, email FROM students";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // delete row   	  
	$sql2 = "DELETE FROM students WHERE studentNo = '$studentNo'";
	$result2 = $conn->query($sql2);
	
	$row = $result1->fetch_row();	
	echo "<b>The client below was deleted successfully:</b> <br><br>studentNo: " .$row[0]. 
	" <br> Name: $row[1] <br> Sex: $row[2] <br> Age: $row[3] <br> E-mail: $row[4] <br>";	 
} else {
  echo "student does not exist!";
}

$conn->close();
?>

<br><br>
<a href="index.html"></a>

</body>
</html>
