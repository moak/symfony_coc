<?php

namespace COC\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class DefaultController extends Controller
{


    function cmp($a, $b)
    {
        return strcmp( $b->getTotal(), $a->getTotal());
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clans = $em->getRepository('COCBundle:Clan')->findAll();
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
        usort($clans, array($this, "cmp"));

        return $this->render('VitrineBundle:Default:index.html.twig', array('clans' => $clans));
    }



}
