<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class WarController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $warInProgress = $em->getRepository('COCBundle:War')->getWarInProgress();
        $isInPreparation = 0;

        if ( ! empty($warInProgress[0]))
        {
            $isInPreparation = 0;
            $now = new \DateTime();
            $end = $warInProgress[0]->getEnd();
            $endMinusOneDay = $end->modify('-1 day');

            if ( $now < $end)
            {
                $isInPreparation = 1;
            }
            $end->modify('+1 day');
            return $this->render('COCBundle:War:menu.html.twig' , array ('warInProgress' => $warInProgress[0], 'isInPreparation' => $isInPreparation));
        }
        $isInPreparation = 0;

        return $this->render('COCBundle:War:menu.html.twig' , array ('warInProgress' => $warInProgress, 'isInPreparation' => $isInPreparation));
    }

    public function futureWarsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $futurWars = $em->getRepository('COCBundle:War')->getFutureWars();
        return $this->render('COCBundle:War:futureWars.html.twig' , array ('futureWars' => $futurWars));
    }
}
