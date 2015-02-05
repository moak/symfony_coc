<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id_clan)
    {
        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);


        return $this->render('COCBundle:Default:index.html.twig', array('clan' => $clan));
    }

    public function menuAction($id_clan, $active)
    {
        $em = $this->getDoctrine()->getManager();

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

       // $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberPlayers();
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan);
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($clan);
       // $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberEntities($clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned();
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($clan);

        return $this->render('COCBundle:Default:menu.html.twig' , array( 'active' => $active,  'clan' => $clan, 'numberImagesBonus' => $numberImagesBonus,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberBases' => $numberBases));
    }
}
