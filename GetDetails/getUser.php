<?php

require_once "../Config/dbConfig.php";

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare(
    "SELECT * FROM users WHERE username = ? AND password = ?"
);
$stmt->execute([$username, $password]);

// Authenticate
if ($stmt->rowCount() === 1) {
    echo "Login successful";
} else {
    echo "Invalid username or password";
}
