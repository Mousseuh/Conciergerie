<?php

namespace App\Tests\Entity;


use App\Entity\User;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class UserTest extends TestCase
{
    public function testValidationFail()
    {

        $user = new User();
        $user->setEmail('This is not an email');

        $violations = $validator->validate($user);

        $this->assertCount(1, $violations);
    }
}