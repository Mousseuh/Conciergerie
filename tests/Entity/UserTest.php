<?php

namespace App\Tests\Entity;


use App\Entity\User;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * test to create a user with false attributes
     */
    public function testValidationFail()
    {

        $user = new User();
        $user->setEmail('This is not an email')
            ->setPassword('test');

        $violations = $validator->validate($user);

        $this->assertCount(1, $violations);
        $expected = [
            'L\'email rentré n\'est pas valide',
            'Votre mot de passe doit faire un minimum de 6 caractères',
        ];

        $messages = $this->getViolationMessages($violations);

        $this->assertEquals($expected, $messages);
    }

    /**
     * test to create a user with valid attributes
     */
    public function testValidationSuccess()
    {
        $user = new User();
        $user->setEmail('test@test.com')
            ->setPassword('test12');

        $violations = $this->validator->validate($user);

        $this->assertCount(0, $violations);
    }
}