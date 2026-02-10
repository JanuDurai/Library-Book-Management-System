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

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$password = $data['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData && password_verify($password, $userData['password'])) {
    session_start();
    $_SESSION['user_id'] = $userData['id'];

    $user = new User($userData);
    echo json_encode($user->getDetails());
} else {
    http_response_code(401);
    echo json_encode(["error" => "Invalid credentials"]);
}
