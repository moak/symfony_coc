<?php

namespace COC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberBases();
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberVideos();
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned();
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberImagesBonus();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        return $this->render('AdminBundle:Default:index.html.twig' , array('clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus,'numberPlayers'=> $numberPlayers,'numberUsersNonAssigned' => $numberUsersNonAssigned, 'numberBases'=> $numberBases, 'numberVideos' => $numberVideos));
    }

    public function menuAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsers();

        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberImagesBonus();

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberBases();
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberVideos();
        $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberBestAttacks();
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        return $this->render('AdminBundle:Default:menu.html.twig' , array('clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus, 'numberPlayers' => $numberPlayers,'numberWars' => $numberWars,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberUsers' => $numberUsers,'numberBases' => $numberBases));
    }
}
