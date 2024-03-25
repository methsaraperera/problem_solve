<?php
// Database connection parameters
$servername = "127.0.0.1"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "incgrade"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['Login'])) {
    $username = ($_POST['student_username']);
}
// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

// Function to authenticate user
function authenticateUser($conn, $username, $password) {
    // Sanitize input to prevent SQL injection
    $username = $conn->real_escape_string($username);

    // Fetch user data from the database
    $sql = "SELECT Username, PasswordHash FROM Students WHERE Username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, verify password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["PasswordHash"];
        
        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct
            return true;
        } else {
            // Password is incorrect
            return false;
        }
    } else {
        // User does not exist
        return false;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form submission
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Authenticate user
    if (authenticateUser($conn, $username, $password)) {
        // Authentication successful, redirect to student dashboard or perform further actions
        // For demonstration, we just echo a success message
        echo "Authentication successful. Welcome, $username!";
    } else {
        // Authentication failed
        echo "Authentication failed. Invalid username or password.";
    }
}

// Close connection
$conn->close();
?>
