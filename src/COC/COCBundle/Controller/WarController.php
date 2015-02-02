<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;

class WarController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $wars = $em->getRepository('COCBundle:War')->findBy( array('result' => '1', 'result' => '2'));

        return $this->render('COCBundle:War:index.html.twig', array('wars' => $wars));
    }


    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $warInProgress = $em->getRepository('COCBundle:War')->getWarInProgress();
        $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $nextWar = $em->getRepository('COCBundle:War')->getNextWar();

        $isInPreparation = 0;

        if (!empty($warInProgress[0])) {
            $isInPreparation = 0;
            $now = new \DateTime();
            $end = $warInProgress[0]->getEnd();
            $endMinusOneDay = $end->modify('-1 day');

            if ($now < $end) {
                $isInPreparation = 1;
            }
            $end->modify('+1 day');
            return $this->render('COCBundle:War:menu.html.twig', array('nextWar' => $nextWar, 'warInProgress' => $warInProgress[0], 'numberWars' => $numberWars, 'isInPreparation' => $isInPreparation));
        }
        $isInPreparation = 0;

        return $this->render('COCBundle:War:menu.html.twig', array('nextWar' => $nextWar, 'warInProgress' => $warInProgress, 'numberWars' => $numberWars, 'isInPreparation' => $isInPreparation));


    }
}
