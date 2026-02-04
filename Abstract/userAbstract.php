<?php
require_once "../Interface/userInterface.php";

abstract class AbstractUser implements UserInterface
{

    protected $name;
    protected $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id   = $id;
    }

    abstract public function getProfile();
}
