<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormuleControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/formule/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Formule index', $crawler->filter('h1')->text());
    }

    public function testUserSpace()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userSpace');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Découvrez les formules disponibles', $crawler->filter('h1')->text());
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/formule/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Create new Formule', $crawler->filter('h1')->text());
    }

}