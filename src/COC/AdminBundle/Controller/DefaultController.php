<?php

namespace COC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberBases();
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberVideos();


        return $this->render('AdminBundle:Default:index.html.twig' , array('numberPlayers'=> $numberPlayers, 'numberBases'=> $numberBases, 'numberVideos' => $numberVideos));
    }

    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsers();
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned();

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberBases();
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberVideos();
        $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberBestAttacks();

        return $this->render('AdminBundle:Default:menu.html.twig' , array('numberPlayers' => $numberPlayers,'numberWars' => $numberWars,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberUsers' => $numberUsers,'numberBases' => $numberBases));
    }
}
