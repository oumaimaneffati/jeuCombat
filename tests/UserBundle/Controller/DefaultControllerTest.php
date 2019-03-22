<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to the world\'s fiercest coliseum', $crawler->filter('h2')->text());
    }

    public function testLoginForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
        var_dump($crawler);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
