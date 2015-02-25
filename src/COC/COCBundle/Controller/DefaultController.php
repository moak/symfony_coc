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
            if ($user->getLearned() == 0 && $user->getClanName() != null)
            {
                $user->setLearned(1);
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

        return $this->render('COCBundle:Default:index.html.twig', array('display' => $display, 'numberPlayers' => $numberPlayers, 'clan' => $clan));
    }

    public function menuAction($id_clan, $active)
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

        return $this->render('COCBundle:Default:menu.html.twig' , array('numberPlayers' => $numberPlayers, 'active' => $active,  'clan' => $clan, 'numberImagesBonus' => $numberImagesBonus,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberBases5' => $numberBases5, 'numberBases6' => $numberBases6, 'numberBases7' => $numberBases7, 'numberBases8' => $numberBases8, 'numberBases9' => $numberBases9, 'numberBases10' => $numberBases10));
    }
}
