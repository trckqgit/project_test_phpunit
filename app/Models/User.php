<?php

namespace App\Models;

class User
{
    public $first_name;
    public $last_name;
    public $email;

    public function setFirstName($firstNameS)
    {
        $this->first_name = trim($firstNameS);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setLastName($lastNameS)
    {
        $this->last_name = trim($lastNameS);
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setEmail($emailS)
    {
        $this->email = $emailS;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }
}

?>