<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\Player;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('COCBundle:Player')->findAll();
        return $this->render('COCBundle:Player:index.html.twig', array('players' => $players));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->findById($id);

        if (!$player)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:Player:show.html.twig', array('player' => $player));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:Player')->findOneByUser($id);
        $player = $em->getRepository('COCBundle:Player')->find($id);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_players'));
        }

        return $this->render('COCBundle:Player:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'player'  => $player
        ));
    }


    public function addAction (Request $request)
    {
        $player = new Player();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new PlayerType(), $player);

        if ($form->handleRequest($request)->isValid())
        {
            $currentSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
            $player->setSeason($currentSeason);
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_players'));
        }

        return $this->render('COCBundle:Player:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);

        if(!$player)
        {
            throw $this->createNotFoundException('No player found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($player);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_players'));

    }
}
