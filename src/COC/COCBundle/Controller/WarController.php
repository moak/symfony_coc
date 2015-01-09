<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WarController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $wars = $em->getRepository('COCBundle:War')->findAll();



        return $this->render('COCBundle:War:menu.html.twig' , array ('wars' => $wars));
    }
}
