<?php

class Articles
{
    private $articles;
    public function __construct()
    {
        /** @var string */  
        $filepath = __DIR__ . '/../../db/articles.json';
        $this->articles = json_decode(file_get_contents($filepath), true);
    }

    public function getAll()
    {
        return $this->articles;
    }
}
