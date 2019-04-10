<?php

class JSONWriter implements WriterInterface
{
    public function write(Article $article){
        return json_encode($article);
    }
}