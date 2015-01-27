<?php

namespace COC\VitrineBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use COC\COCBundle\Entity\Clan;

use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ClanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClanController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clans = $em->getRepository('COCBundle:Clan')->findAll();

        return $this->render('COCBundle:Clan:index.html.twig', array('clans' => $clans));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Clan')->findById($id);

        if (!$player)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:Clan:show.html.twig', array('player' => $player));
    }

    public function editAction (Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Clan')->findOneByUser($userId);
        $form = $this->get('form.factory')->create(new ClanType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_clans'));
        }

        return $this->render('COCBundle:Clan:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'player'  => $player
        ));
    }


    public function addAction (Request $request)
    {
        $clan = new Clan();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ClanType(), $clan);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($clan);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_clans'));
        }

        return $this->render('COCBundle:Clan:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

}
