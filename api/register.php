<?php

// Database connection
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate input
    if (empty($username) || empty($password) || empty($email)) {
        echo json_encode(['error' => 'All fields are required.']);
        exit;
    }

    // Insert user into database
    $stmt = $conn->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $username, $hashed_password, $email);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'User registered successfully.']);
    } else {
        echo json_encode(['error' => 'User registration failed.']);
    }
    $stmt->close();
}

$conn->close();
?>
