<?php

namespace App\Data;

class UserDTO
{

    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 3;
    const PASSWORD_MIN_LENGTH = 6;
    const FIRST_NAME_MIN_LENGTH = 3;
    const LAST_NAME_MIN_LENGTH = 3;

    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;

    public static function create($username, $password, $firstName, $lastName, $id = null)
    {
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
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
        PDOValidator::validate(
            self::USERNAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $username,
            'username out of range'
        );

        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        PDOValidator::validate(
            self::PASSWORD_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $password,
            'password out of range'
        );

        $this->password = $password;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        PDOValidator::validate(
            self::FIRST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $firstName,
            'firstname out of range'
        );

        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        PDOValidator::validate(
            self::LAST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $lastName,
            'lastname out of range'
        );

        $this->lastName = $lastName;
        return $this;
    }
}