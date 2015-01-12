<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Form\Type\PlayerAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PlayerAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('COCBundle:Player')->findAll();

        return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('players' => $players));
    }

    public function addAction (Request $request)
    {
        $player = new Player();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new PlayerAdminType(), $player);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players'));
        }

        return $this->render('AdminBundle:PlayerAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);

        if(!$war)
        {
            throw $this->createNotFoundException('No war found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($war);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_wars'));

    }




}
