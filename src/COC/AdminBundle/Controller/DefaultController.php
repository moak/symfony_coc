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

        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);

        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberEntities($id_clan);

        return $this->render('AdminBundle:Default:index.html.twig' , array('numberUsers'=> $numberUsers,'display' => $display,'clan' => $clan,'numberUsersNonAssigned' => $numberUsersNonAssigned));
    }

    public function menuAction($id_clan, $language_switcher)
    {

        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }
        $em = $this->getDoctrine()->getManager();
        $numberUsers = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsers($id_clan);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $numberWars = $em->getRepository('COCBundle:War')->getNumberEntities($id_clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($id_clan);
        return $this->render('AdminBundle:Default:menu.html.twig' , array('language_switcher' => $language_switcher,'clan' => $clan, 'numberWars' => $numberWars,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberUsers' => $numberUsers));
    }
}
