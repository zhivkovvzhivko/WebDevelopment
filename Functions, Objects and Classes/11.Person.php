<?php

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, string $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }
}

$n = intval(readline());

$persons = [];
while($n-- > 0){
    $input = explode(' ', readline());

    $name = input[0];
    $age = intval(input[1]);

    $persons[] = new Persons($name, $age);
}

$filterPeople = array_filter($persons, function (Person $person){
    return $person->getAge() > 30;
});

usort($persons, function (Person $p1, Person $p2){
    return $p1->getName() <=> $p2->getName();
});
