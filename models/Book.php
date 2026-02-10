<?php

spl_autoload_register(function ($className) {

        $file = __DIR__ . "/" . "Interface" . $className . ".php";

        if (file_exists($file)) {
            require_once $file;
            return;
        }
});

class Book implements dataInterface
{

    private $title;
    private $isbn;
    private $format;
    private $author;
    private $year_of_publish;
    private $is_available = true;

    public function __construct($data)
    {
        $this->title           = $data['title'];
        $this->isbn            = $data['isbn'];
        $this->format          = $data['format'];
        $this->author          = $data['author'];
        $this->year_of_publish = $data['year_of_publish'];
    }

    public function getDetails()
    {
        return [
            "title"           => $this->title,
            "isbn"            => $this->isbn,
            "format"          => $this->format,
            "author"          => $this->author,
            "year of publish" => $this->year_of_publish,
            "available"       => $this->is_available,
        ];
    }
}
