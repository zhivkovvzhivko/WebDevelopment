<?php

spl_autoload_register();

/**
 * CitizensAndRobots[]
 */
$citizensAndRobots = [];

while (true){
    $input = explode(' ', readline());

    if ($input[0] == 'End'){
        break;
    }

    $identity = null;

    if (count($input) == 2){
        $model = $input[0];
        $id = $input[1];
        $citizensAndRobots[] = new Robot($model, $id);
    } else{
        $name = $input[0];
        $age = intval($input[1]);
        $id = $input[2];
        $citizensAndRobots[] = new Citizen($name, $age, $id);
    }
}

$searchingId = readline();

foreach ($citizensAndRobots as $all){
    echo $all->getFakeId($searchingId);
}
