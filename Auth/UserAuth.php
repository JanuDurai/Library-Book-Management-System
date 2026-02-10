<?php

class UserAuth {

    private $validUser = "Janu";
    private $validPass = "Janu123";

    public function authenticate() {

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $this->unauthorized("Authorization required");
        }

        if (
            $_SERVER['PHP_AUTH_USER'] !== $this->validUser ||
            $_SERVER['PHP_AUTH_PW'] !== $this->validPass
        ) {
            $this->unauthorized("Invalid credentials");
        }

        return true;
    }

    private function unauthorized($message) {
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(["error" => $message]);
        exit;
    }
}
