<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22/04/2019
 * Time: 20:32
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/service/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Service index', $crawler->filter('h1')->text());
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/service/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Create new Service', $crawler->filter('h1')->text());
    }

}