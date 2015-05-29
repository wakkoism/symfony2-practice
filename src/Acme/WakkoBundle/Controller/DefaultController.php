<?php

namespace Acme\WakkoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Acme\WakkoBundle\Entity\Schedule;
//use Acme\WakkoBundle\Entity\Customer;
#use AppBundle\Form\CommentType;

class DefaultController extends Controller
{
    /**
     * @Route("/wakko", name="schedule_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AcmeWakkoBundle:Schedule')->findLatest();

        return $this->render('AcmeWakkoBundle:Default:test.html.twig', array(
            'posts' => $posts
        ));
    }
}
