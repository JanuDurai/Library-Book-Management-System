<?php
require "../config/dbConfig.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $password === $user['password']) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: books.php");
    exit;
} else {
    echo "Invalid username or password";
}