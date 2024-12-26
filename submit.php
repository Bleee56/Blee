<?php
// Database credentials
$host = "sql307.infinityfree.com"; // Your MySQL Host Name
$username = "if0_37964623"; // Your MySQL User Name
$password = "Kandy678"; // Replace with your actual vPanel password
$database = "if0_37964623_submit"; // Your MySQL Database Name

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prevent SQL injection
$name = $conn->real_escape_string($name);
$email = $conn->real_escape_string($email);
$message = $conn->real_escape_string($message);

// Insert data into the database
$sql = "INSERT INTO submit (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
