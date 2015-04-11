<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class WarController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $wars = $em->getRepository('COCBundle:War')->findBy( array('result' => array(1,2), 'clan' => $id_clan));

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        return $this->render('COCBundle:War:index.html.twig', array('clan' => $clan, 'wars' => $wars));
    }


    public function menuAction($id_clan)
    {
        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);
        $em = $this->getDoctrine()->getManager();
        $warInProgress = $em->getRepository('COCBundle:War')->getWarInProgress($clan);
        $numberWars = $em->getRepository('COCBundle:War')->getHistoryWar($clan);
        $nextWar = $em->getRepository('COCBundle:War')->getNextWar($clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $isInPreparation = 0;

        if (!empty($warInProgress[0])) {
            $isInPreparation = 0;
            $now = new \DateTime();
            $end = $warInProgress[0]->getEnd();


            if ($now < $end) {
                $isInPreparation = 1;
            }
            $end->modify('+1 day');
            return $this->render('COCBundle:War:menu.html.twig', array('clan' => $clan, 'nextWar' => $nextWar, 'warInProgress' => $warInProgress[0], 'numberWars' => $numberWars, 'isInPreparation' => $isInPreparation));
        }
        $isInPreparation = 0;

        return $this->render('COCBundle:War:menu.html.twig', array('clan' => $clan, 'nextWar' => $nextWar, 'warInProgress' => $warInProgress, 'numberWars' => $numberWars, 'isInPreparation' => $isInPreparation));

    }
}
