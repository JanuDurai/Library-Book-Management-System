<?php

require_once "../Interface/assetInterface.php";

abstract class AbstractAsset implements AssetInterface
{

    protected $isbn;
    protected $format;
    protected $available = true;

    public function __construct($isbn, $format)
    {
        $this->isbn   = $isbn;
        $this->format = $format;
    }

    public function isAvailable()
    {
        return $this->available;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getFormat()
    {
        return $this->format;
    }

    abstract public function getDetails();
}
