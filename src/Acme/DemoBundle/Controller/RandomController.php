<?php

// src/Acme/DemoBundle/Controller/RandomController.php
namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RandomController extends Controller
{
    public function indexAction($limit)
    {
        $data = NULL;
        if (is_numeric($limit)) {
            $number = rand(1, $limit);
        
            $data = $this->render('AcmeDemoBundle:Random:index.html.twig', array(
                'number' => $number
                )
            );
        }
        return $data;
        
    }
}
