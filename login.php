<?php

session_start();

// Database connection (same as register.php)

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password']; // This should be hashed during authentication

// Fetch user from database based on username
$sql = "SELECT * FROM login WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password matches, login successful
        $_SESSION['username'] = $username;
        header("Location: patient.php"); // Redirect to patient page
        exit();
    } else {
        // Password does not match
        header("Location: login.php?error=1");
        exit();
    }
} else {
    // User not found
    header("Location: login.php?error=1");
    exit();
}

$conn->close();
?>