<?php

spl_autoload_register();

$writer_name = $_GET??'HTML';
$writer_name .= 'Writer';

$article = new Article('Podsaznannieto moje vsi4ko', 'John Keho', '20.00');

try{
    $writer = Factory::getWriter($writer_name);
    echo $writer->write($article);
} catch (Exception $e) {
    echo 'Some error: ' . $e->getMessage();
}
