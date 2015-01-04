<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('UserBundle:User')->findAll();

        $sdf = $em->getRepository('COCBundle:UserInfo')->isReferenced($this->getUser());

        return $this->render('UserBundle:User:index.html.twig', array('users' => $list));
    }
}
