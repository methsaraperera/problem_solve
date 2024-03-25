<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color: blue;}
</style>
</head>
<body>

<h2>Student List</h2>

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

$sql = "SELECT studentNo, name, sex, age, email FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table><tr><th>studentNo</th><th>Name</th><th>Sex</th><th>Age</th><th>Email</th></tr>";
  while($row = $result->fetch_assoc()) {    
	echo "<tr><td>$row[studentNo]</td><td>$row[name]</td><td>$row[sex]</td><td>$row[age]</td><td>$row[email]</td></tr>";	
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<br><br>
<a href="index.html">Back to main menu</a>

</body>
</html>