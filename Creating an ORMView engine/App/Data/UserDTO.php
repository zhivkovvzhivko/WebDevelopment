<?php

namespace App\Data;

class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $bornOn;

    public static function create($username, $password, $firstName, $lastName, $bornOn, $id = null)
    {
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBornOn($bornOn)
            ->setId($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBornOn()
    {
        return $this->bornOn;
    }

    public function setBornOn($bornOn)
    {
        $this->bornOn = $bornOn;
        return $this;
    }
}