<?php

namespace App\Data;

class UserDTO
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $active;

    public static function create($firstName, $lastName, $email, $password, $active = 0, $id = null)
    {
        return (new UserDTO())
            ->setId($id)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setPassword($password)
            ->setActive($active);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): UserDTO
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active): UserDTO
    {
        $this->active = $active;
        return $this;
    }
}