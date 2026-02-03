<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=library_db",
        "root",
        "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "DB Connection Failed"]);
    exit;
}
