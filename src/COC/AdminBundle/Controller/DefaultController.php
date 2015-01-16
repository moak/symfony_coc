<?php

namespace COC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();

        return $this->render('AdminBundle:Default:index.html.twig' , array('numberPlayers'=> $numberPlayers));
    }
}
