<?php
header("Content-Type: application/json");

require_once "../Auth/UserAuth.php";
require_once "../Model/Book.php";

$auth = new UserAuthenticate();
$auth->authenticate();

$title = $_POST['title'] ?? null;
$isbn = $_POST['isbn'] ?? null;
$format = $_POST['format'] ?? null;

if (!$title || !$isbn || !$format) {
    echo json_encode(["error" => "Missing book data"]);
    exit;
}

if (!in_array($format, ["Physical", "Digital"])) {
    echo json_encode(["error" => "Invalid format"]);
    exit;
}

$book = new Book($title, $isbn, $format);

echo json_encode($book->getDetails());
