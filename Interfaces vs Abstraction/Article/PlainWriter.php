<?php

class PlainWriter implements WriterInterface
{
    public function write(Article $article)
    {
        $txt = 'Title: '. $article->getTitle() ."\n";
        $txt .= 'Author: '. $article->getAuthor() ."\n";
    }
}

