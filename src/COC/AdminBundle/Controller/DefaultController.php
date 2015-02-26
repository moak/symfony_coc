<?php

namespace COC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
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

        return $this->render('AdminBundle:SeasonAdmin:index.html.twig', array('season' => $season, 'days' => $days, 'hours' => $hours, 'min' => $min ));
    }



    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $display = false;
        $user = $this->getUser();
        if ( $user != null)
        {
            if ($user->getVisited() == 0 && $user->getClanName() != null)
            {
                $user->setVisited(1);
                $em->persist($user);
                $em->flush();
                $display = true;
            }
        }
        else
        {
            $display = true;
        }


        if ( $this->get('security.context')->isGranted('ROLE_USER')) {
            if($this->getUser()->getClan()->getId() != $id_clan)
            {
                throw $this->createNotFoundException('Page not found');
            }
        }


        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($id_clan);
        $numberBases5 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 5);
        $numberBases6 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 6);
        $numberBases7 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 7);
        $numberBases8 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 8);
        $numberBases9 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 9);
        $numberBases10 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 10);
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($id_clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($id_clan);
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberEntities($id_clan);


        return $this->render('AdminBundle:Default:index.html.twig' , array('numberUsers'=> $numberUsers, 'numberBases5' => $numberBases5, 'numberBases6' => $numberBases6, 'numberBases7' => $numberBases7, 'numberBases8' => $numberBases8, 'numberBases9' => $numberBases9, 'numberBases10' => $numberBases10, 'display' => $display,'clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus,'numberPlayers'=> $numberPlayers,'numberUsersNonAssigned' => $numberUsersNonAssigned, 'numberVideos' => $numberVideos));
    }

    public function menuAction($id_clan)
    {

        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }
        $em = $this->getDoctrine()->getManager();
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsers($id_clan);

        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($id_clan);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($id_clan);
        $numberBases5 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 5);
        $numberBases6 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 6);
        $numberBases7 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 7);
        $numberBases8 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 8);
        $numberBases9 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 9);
        $numberBases10 = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan, 10);

        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($id_clan);
        $numberWars = $em->getRepository('COCBundle:War')->getNumberEntities($id_clan);
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberEntities($id_clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);


        return $this->render('AdminBundle:Default:menu.html.twig' , array('numberBases5' => $numberBases5, 'numberBases6' => $numberBases6, 'numberBases7' => $numberBases7, 'numberBases8' => $numberBases8, 'numberBases9' => $numberBases9, 'numberBases10' => $numberBases10,'clan' => $clan, 'numberImagesBonus'=> $numberImagesBonus, 'numberPlayers' => $numberPlayers,'numberWars' => $numberWars,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberUsers' => $numberUsers));
    }
}
