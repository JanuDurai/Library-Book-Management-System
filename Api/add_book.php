<?php
require "../config/dbConfig.php";


session_start();

if (! isset($_SESSION['user_id'])) {
    die("Login required");
}

$userId = $_SESSION['user_id'];
$bookId = $_POST['book_id'];

$stmt = $pdo->prepare("SELECT is_available FROM books WHERE id = ?");
$stmt->execute([$bookId]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (! $book || ! $book['is_available']) {
    echo "Book unavailable";
    exit;
}

$pdo->prepare("INSERT INTO user_book (user_id, book_id) VALUES (?, ?)")
    ->execute([$userId, $bookId]);

    echo "Book added successfully";
header("Location: ../ui/books.php");
exit;
