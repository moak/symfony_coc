<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\ClanType;
use COC\COCBundle\Form\Type\ClanPasswordType;
use COC\COCBundle\Form\Type\ClanHiringType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ClanAdminController extends Controller
{

    public function indexAction($id_clan)
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $clan = $em->getRepository('COCBundle:Clan')->find($id_clan);


        return $this->render('AdminBundle:ClanAdmin:index.html.twig', array('clan' => $clan));
    }

    public function editAction (Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $em->getRepository('COCBundle:Clan')->find($id_clan);
        $form = $this->get('form.factory')->create(new ClanType(), $clan );

        if ($form->handleRequest($request)->isValid())
        {
            $clan->getImage()->setIdclan($clan->getId());

            $em = $this->getDoctrine()->getManager();
            $em->persist($clan);
            $em->flush();
            return $this->redirect($this->generateUrl('admin', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ClanAdmin:edit.html.twig', array(
            'form'      =>  $form->createView(),
            'clan'  => $clan
        ));
    }

    public function editPasswordAction (Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $em->getRepository('COCBundle:Clan')->find($id_clan);
        $form = $this->get('form.factory')->create(new ClanPasswordType(), $clan );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clan);
            $em->flush();
            return $this->redirect($this->generateUrl('admin', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ClanAdmin:editPassword.html.twig', array(
            'form'      =>  $form->createView(),
            'clan'  => $clan
        ));
    }


    public function editHiringAction (Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $em->getRepository('COCBundle:Clan')->find($id_clan);
        $form = $this->get('form.factory')->create(new ClanHiringType(), $clan );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clan);
            $em->flush();
            return $this->redirect($this->generateUrl('admin', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ClanAdmin:editHiring.html.twig', array(
            'form'      =>  $form->createView(),
            'clan'  => $clan
        ));
    }



    public function deleteAction($id, $id_clan)
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
