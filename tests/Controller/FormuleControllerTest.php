<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormuleControllerTest extends WebTestCase
{

    /**
     * test redirection on the Formule admin page
     */
    public function testIndex()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'superadmin1',
        ]);


        $crawler = $client->request('GET', '/formule/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Formule index', $crawler->filter('h1')->text());
    }

    /**
     * test redirection on the Formule and Service choice page
     */
    public function testFormuleService()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'superadmin1',
        ]);

        $crawler = $client->request('GET', '/formule/userSpace');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Découvrez les formules disponibles', $crawler->filter('h1')->text());
    }

    /**
     * test redirection on the Formule creation page
     */
    public function testNew()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'superadmin1',
        ]);

        $crawler = $client->request('GET', '/formule/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Create new Formule', $crawler->filter('h1')->text());
    }

}