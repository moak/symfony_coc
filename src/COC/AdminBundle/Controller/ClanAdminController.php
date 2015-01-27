<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Form\Type\PlayerAdminType;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ClanAdminController extends Controller
{

    public function indexAction()
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $clan = $em->getRepository('COCBundle:Clan')->find();


        return $this->render('AdminBundle:ClanAdmin:index.html.twig');
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players'));
        }

        return $this->render('AdminBundle:PlayerAdmin:edit.html.twig', array(
            'form'      =>  $form->createView(),
            'player'  => $player
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

        return $this->redirect($this->generateUrl('admin_players'));
    }




}
