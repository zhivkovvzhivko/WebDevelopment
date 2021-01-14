<?php

require_once 'common.php';

$bookService = new \App\Service\BookService(new \App\Repository\BookRepository($db, new \Core\DataBinder()));
$genreService = new \App\Service\GenreService(new \App\Repository\GenreRepository($db));

$bookHttpHandler = new \App\Http\BookHttpHandler($template, new \Core\DataBinder());

$bookHttpHandler->show($bookService, $_GET);
