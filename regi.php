<?php
// MySQL database connection details
$servername = "localhost";
$dbUsername = "root"; // Your MySQL username
$dbPassword = ""; // Your MySQL password
$dbname = "project";  // The database name

// Create connection to MySQL database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username, email, and password from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before storing it in the database
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Registration successful! You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
