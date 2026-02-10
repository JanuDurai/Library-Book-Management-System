<?php
spl_autoload_register(function ($className) {

        $file = __DIR__ . "/" . "Interface" . $className . ".php";

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    
});
class User implements dataInterface
{

    private $name;
    private $memberId;
    private $email;

    public function __construct($data)
    {
        $this->name     = $data['name'];
        $this->memberId = $data['memberId'];
        $this->email    = $data['email'];
    }

    public function getDetails()
    {
        return [
            "name"     => $this->name,
            "memberId" => $this->memberId,
            "email"    => $this->email,
        ];
    }

}
