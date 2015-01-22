<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('COCBundle:Default:index.html.twig');
    }

    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

       // $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberBases();
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberVideos();
       // $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberBestAttacks();
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned();
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberImagesBonus();

        return $this->render('COCBundle:Default:menu.html.twig' , array('numberImagesBonus' => $numberImagesBonus,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberBases' => $numberBases));
    }
}
