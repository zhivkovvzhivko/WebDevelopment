<?php

spl_autoload_register();

class Main
{
    private $cats;

    public function __construct()
    {
        $this->cats = [];
    }

    public function run() {
        $this->readData();
    }

    public function readData() {

        $factory = new Factory();
        while(true) {
            $input = explode(' ', readline());
            if ($input[0] === 'End') {
                break;
            }

            $catName = $input[1];
            $cat = $factory::getCat($input);
            $this->cats[$catName] = $cat;
        }

        $searchingName = readline();
        $this->printCat($searchingName); // echo Cymric::class
    }

    private function printCat($searchingName) {
        if (isset($this->cats[$searchingName])) {
            echo $this->cats[$searchingName];
        }
    }
}

$main = new Main();
$main->run();