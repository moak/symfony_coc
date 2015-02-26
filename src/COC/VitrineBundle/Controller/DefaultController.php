<?php

namespace COC\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clans = $em->getRepository('COCBundle:Clan')->findBy(array('status' => array(0, 1)));
        foreach ($clans as $clan)
        {
            $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
            $total = 0;
            $number = 0;
            foreach ($players as $player)
            {
               $total = $total + $player['total'];
               $number = $number + 1;
            }
            $clan->setTotal($total);
            $clan->setNbMember($number);
        }

        usort($clans, function ($a, $b) {
            return strnatcmp($b->getTotal(), $a->getTotal());
        });

        return $this->render('VitrineBundle:Default:index.html.twig', array('clans' => $clans));
    }

}
