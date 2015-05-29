<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TestBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", name="acme_default")
     * @
     */
    public function indexAction($name)
    {
        return $this->render('AcmeTestBundle:Default:index.html.twig', array(
            'name' => ucwords($name),
        ));
    }
    /**
     * @Route("/form/test")
     */
    public function formAction(Request $request)
    {
      $task = new Task();
      //$task->setTask('Write a new blog post');
      //$task->setDueDate(new \DateTime('tomorrow'));

      $form = $this
        ->createFormBuilder($task)
        ->add('title', 'text')
        ->add('task', 'text')
        ->add('dueDate', 'date')
        ->add('save', 'submit', array('label' => 'Create Task'))
        ->getForm();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          //$task = $form->getData();
          //var_dump($task);

          $em = $this->getDoctrine()->getManager();
          $em->persist($task);
          $em->flush();

          //return $this->redirectToRoute('acme_default', array('name' => 'world'));
      }

      return $this->render('AcmeTestBundle:Default:form.html.twig', array(
        'form' => $form->createView(),
      ));

    }
}
