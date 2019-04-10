<?php

class HTMLWriter implements WriterInterface
{
    public function write(Article $article){
        $html = '<h1>' . $article->getTitle() . '<h1/>';
        $html .= '<h2>' . $article->getAuthor() . '<h2/>';
        $html .= '<div>' . $article->getPrice() . '<div>';
    }
}