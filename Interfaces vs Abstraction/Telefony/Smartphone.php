<?php

spl_autoload_register();

class Smartphone implements ICall, IBrowse
{

    public function call(string $phoneNumber): string
    {
        // if(!ctype_digit($phoneNumber)){ // it also works
        if(!preg_match_all('/[0-9]+/', $phoneNumber)){
            throw new Exception("Invalid Number!\n");
        }

        return "Calling... {$phoneNumber}\n";
    }

    public function browse(string $url): string
    {
        if(preg_match_all('/[0-9]/', $url)){
            throw new Exception('Invalid URL!');
        }
        return "Browsing...{$url}\n";
    }
}

$numbers = ['0882134215', '0882134333', '08992134215', '0558123', '3333'];
$sites = ['http://softuni.bg ', 'http://youtube.com', 'http://www.g00gle.com'];

$phone = new Smartphone();
foreach ($numbers as $number){
    try{
        echo $phone->call($number);
    } catch (Exception $ex){
        echo $ex->getMessage();
    }
}

foreach ($sites as $site){
    try{
        echo $phone->browse($site);
    } catch (Exception $ex){
        echo $ex->getMessage();
    }
}
