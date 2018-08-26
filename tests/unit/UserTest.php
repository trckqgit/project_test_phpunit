<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }   

    public function testThatWeCanGetTheLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName('Garrett');

        $this->assertEquals($user->getLastName(), 'Garrett');
    }   

    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName('Garrett');

        $this->assertEquals($user->getFullName(), 'Billy Garrett');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;

        $user->setFirstName('  Billy ');
        $user->setLastName('       Garrett');

        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getLastName(), 'Garrett');
    }
}

?>