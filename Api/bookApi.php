<?php
spl_autoload_register(function ($className) {
    $baseDir = dirname(__DIR__);

    $folders = ['config', 'models'];

    foreach ($folders as $folder) {
        $file = $baseDir . "/$folder/$className.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

session_start();
if (! isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(["error" => "Login required"]);
    exit;
}

$stmt  = $pdo->query("SELECT * FROM books");
$books = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $book    = new Book($row);
    $books[] = $book->getDetails();
}

echo json_encode($books);

