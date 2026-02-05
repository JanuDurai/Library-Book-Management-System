<?php
header("Content-Type: application/json");

spl_autoload_register(function ($className) {
    $baseDir = dirname(__DIR__);

    $folders = ['Auth', 'Model'];

    foreach ($folders as $folder) {
        $file = $baseDir . "/$folder/$className.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$auth = new UserAuth();
$auth->authenticate();

$data = $_POST;

$errors = isValidRequest($data);

if (! empty($errors)) {
    http_response_code(400);
    echo json_encode($errors);
    exit();
} else {
    if (isUserRequest($data)) {
        $user = new User($data);
        echo json_encode($user->getDetails());
        exit();
    } else if (isBookRequest($data)) {
        $book = new Book($data);
        echo json_encode($book->getDetails());
        exit();
    }
}

function isUserRequest(array $data)
{
    return isset($data['name'], $data['memberId'], $data['email']);
}

function isBookRequest(array $data)
{
    return isset($data['title'], $data['isbn'], $data['format'],
        $data['author'], $data['year_of_publish']);
}

function isValidRequest(array $data)
{
    $errors = [];
    if (isUserRequest($data)) {
        $attributes = ["name", "memberId", "email"];
    } else if (isBookRequest($data)) {
        $attributes = ["title", "isbn", "format", "author", "year_of_publish"];
    }

    foreach ($attributes as $attr) {
        if (empty($data[$attr])) {
            $errors[$attr] = ucwords(str_replace("_", " ", $attr)) . ' is required';
            return $errors;
        }
    }

    if (count($attributes) === 3) {
        if (! filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }
    }

    if (count($attributes) === 5) {
        if (! in_array($data['format'], ['physical', 'digital', "Physical", "Digital"])) {
            $errors['format'] = "Invalid book format";
        }
    }

    return $errors;
}