<?php
namespace Acme\WakkoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Acme\WakkoBundle\Form\Type\RegistrationType;
use Acme\WakkoBundle\Form\Model\Registration;

/**
 * @Route("/wakko/register")
 */
class AccountController extends Controller
{
    /**
     * @Route("/", name="acount_index")
     * @Method("GET")
     */
    public function registerAction()
    {
        $registration = new Registration();

        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AcmeWakkoBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/create", name="account_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $registration = new Registration();

        $em = $this->getDoctrine()->getManager();
        var_dump($registration);
        $form = $this->createForm(new RegistrationType(), $registration);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirectToRoute('wakko/user');
        }

        return $this->render(
            'AcmeWakkoBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}