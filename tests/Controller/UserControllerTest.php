<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Liste des utilisateurs', $crawler->filter('h1')->text());
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Créer un utilisateur', $crawler->filter('h1')->text());
    }

}