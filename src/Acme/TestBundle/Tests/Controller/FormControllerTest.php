<?php

// src/Acme/TestBundle/Tests/Controller/PostControllerTest.php
namespace Acme\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testFormPost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/form/test');

        //var_dump($crawler);
        $form = $crawler->selectButton('Create Task')->form();



        // set some values
        //$form['form[task]'] = 'moo cow';
        $form->setValues(array('form[task]' => 'hello testing'));


        // submit the form
        $crawler = $client->submit($form);


    }
}
