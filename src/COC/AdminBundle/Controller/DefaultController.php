<?php

namespace COC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($id_clan);
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($id_clan);
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($id_clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($id_clan);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        return $this->render('AdminBundle:Default:index.html.twig' , array('clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus,'numberPlayers'=> $numberPlayers,'numberUsersNonAssigned' => $numberUsersNonAssigned, 'numberBases'=> $numberBases, 'numberVideos' => $numberVideos));
    }

    public function menuAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsers($id_clan);

        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($id_clan);

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($id_clan);
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($id_clan);
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($id_clan);
        $numberWars = $em->getRepository('COCBundle:War')->getNumberEntities($id_clan);
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberEntities($id_clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        return $this->render('AdminBundle:Default:menu.html.twig' , array('clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus, 'numberPlayers' => $numberPlayers,'numberWars' => $numberWars,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberUsers' => $numberUsers,'numberBases' => $numberBases));
    }
}
