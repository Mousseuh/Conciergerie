<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{

    /**
     * test redirection on the User admin page
     */
    public function testIndex()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'superadmin1',
        ]);

        $crawler = $client->request('GET', '/user/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Liste des utilisateurs', $crawler->filter('h1')->text());
    }


    /**
     * test redirection on the User creation page
     */
    public function testNew()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'superadmin1',
        ]);

        $crawler = $client->request('GET', '/user/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Créer un utilisateur', $crawler->filter('h1')->text());
    }

}