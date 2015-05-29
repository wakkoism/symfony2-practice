<?php

// src/Acme/TestBundle/Tests/Controller/PostControllerTest.php
namespace Acme\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/world');

        // Grab content
        // var_dump($client->getResponse()->getContent());

        $link = $crawler
            ->filter('a:contains("Google")')
            ->eq(0)
            ->link();

        $client->click($link);

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Hello World")')->count()
        );

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Hello World")')->count()
        );

        $this->assertGreaterThan(
            0,
            $crawler->filter('h1')->count()
        );

    }
}
