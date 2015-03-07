<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        $last_update_player = $em->getRepository('COCBundle:Player')->getLastUpdate($clan);
        $last_update_base = $em->getRepository('COCBundle:ImageBase')->getLastUpdate($clan);
        $last_update_bestAttack = $em->getRepository('COCBundle:ImageBestAttack')->getLastUpdate($clan);

        if ( $last_update_base == null)
            $last_update_base['updatedAt'] = null;

        if ( $last_update_bestAttack == null)
            $last_update_bestAttack['updatedAt'] = null;

        $user = $this->getUser();

        if ( $clan  == null)
        {
            throw $this->createNotFoundException('This page does not exist.');
        }

        if ( $user == null && $clan->getPrivacy() == 1 )
            throw $this->createNotFoundException('This page does not exist.');

        $display = false;

        if ( $user != null )
        {
            if ($user->getVisited() == 0 && $user->getClan()->getId() == $clan->getId())
            {
                $user->setVisited(1);
                $em->persist($user);
                $em->flush();
                $display = true;
            }
        }
        else
        {
            if ($id_clan == 1)
                $display = true;
        }
        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($clan);

        return $this->render('COCBundle:Default:index.html.twig', array('last_update_bestAttack' => $last_update_bestAttack,'last_update_base' => $last_update_base,'last_update_player' => $last_update_player, 'display' => $display, 'numberPlayers' => $numberPlayers, 'clan' => $clan));
    }

    public function displaySeasonAction()
    {
        $now = time();

        $em = $this->getDoctrine()->getManager();
        $now = new \DateTime('now');
        $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        $end = $season->getEnd()->getTimestamp();
        $date = new \DateTime('now');
        $now = $date->getTimestamp();
        $endsIn = $end - $now;

        $days = $endsIn / 86400;
        $endsIn -= ((int) $days * 86400);
        $hours = $endsIn / 3600;
        $endsIn -= ((int) $hours * 3600);
        $min = $endsIn / 60;

        return $this->render('COCBundle:Season:index.html.twig', array('season' => $season, 'days' => $days, 'hours' => $hours, 'min' => $min ));
    }


    public function menuAction($id_clan, $active, $language_switcher)
    {
        $em = $this->getDoctrine()->getManager();

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($clan);

        $numberBases5 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 5);
        $numberBases6 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 6);
        $numberBases7 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 7);
        $numberBases8 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 8);
        $numberBases9 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 9);
        $numberBases10 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 10);

        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($clan);
       // $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberEntities($clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($clan);
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($clan);

        return $this->render('COCBundle:Default:menu.html.twig' , array('language_switcher' => $language_switcher, 'numberPlayers' => $numberPlayers, 'active' => $active,  'clan' => $clan, 'numberImagesBonus' => $numberImagesBonus,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberBases5' => $numberBases5, 'numberBases6' => $numberBases6, 'numberBases7' => $numberBases7, 'numberBases8' => $numberBases8, 'numberBases9' => $numberBases9, 'numberBases10' => $numberBases10));
    }
}
