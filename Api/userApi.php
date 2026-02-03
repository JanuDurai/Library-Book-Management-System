<?php
header("Content-Type: application/json");

require_once "../Auth/UserAuth.php";
require_once "../Model/user.php";

$auth = new UserAuthenticate();
$auth->authenticate();

$name = $_POST['name'] ?? null;
$id = $_POST['memberId'] ?? null;
$email = $_POST['email'] ?? null;

if (!$name || !$id || !$email) {
    echo json_encode(["error" => "Missing user data"]);
    exit;
}

$user = new Member($name, $id, $email);

echo json_encode($user->getProfile());
