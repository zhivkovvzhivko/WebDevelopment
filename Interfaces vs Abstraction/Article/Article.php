<?php

class Article
{
    private $title;
    private $author;
    private $price;

    /**
     * Article constructor.
     * @param $title
     * @param $author
     * @param $price
     */
    public function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function printArticle($mode = 'html'){
        if ($mode == 'json'){
            json_encode($this);
        } else{
            $html = '<h1>' . $this->title . '<h1/>';
            $html .= '<h2>' . $this->author . '<h2/>';
            $html .= '<div>' . $this->price . '<div>';
        }
        return $html;
    }
}