<?php
require_once "../Abstract/userAbstract.php";

class User extends AbstractUser {

    private $email;

    public function __construct($name, $id, $email) {
        parent::__construct($name, $id);
        $this->email = $email;
    }

    public function getProfile() {
        return [
            "name" => $this->name,
            "memberId" => $this->id,
            "email" => $this->email
        ];
    }
}
