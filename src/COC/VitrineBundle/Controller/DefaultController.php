<?php

namespace COC\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Application\Sonata\UserBundle\Form\Type\RegistrationClanFormType;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Entity\User;




class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $user = new User();
        $form = $this->get('form.factory')->create(new RegistrationClanFormType($user->getClan()), $user);

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render('VitrineBundle:Default:index.html.twig', array(
            'form'      =>  $form->createView(),
        ));

    }
}
