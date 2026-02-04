<?php
require_once "../Abstract/assetAbstract.php";

class Book extends AbstractAsset {

    private $title;

    public function __construct($title, $isbn, $format) {
        parent::__construct($isbn, $format);
        $this->title = $title;
    }

    public function getDetails() {
        return [
            "title" => $this->title,
            "isbn" => $this->isbn,
            "format" => $this->format,
            "available" => $this->available
        ];
    }
}
