<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\War;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use COC\COCBundle\Form\Type\WarType;

class WarAdminController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $wars = $em->getRepository('COCBundle:War')->findByClan($clan);


        return $this->render('AdminBundle:WarAdmin:index.html.twig', array('wars' => $wars, 'clan'=> $clan));
    }

    public function addAction (Request $request, $id_clan)
    {
        $war = new War();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new WarType(), $war);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $start = clone $war->getStart();
            $war->setEnd($start->modify('+2 day'));
            $war->setClan($clan);
            $em->persist($war);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_wars', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:WarAdmin:add.html.twig', array( 'clan'=> $clan,
            'form'      =>  $form->createView(),
        ));
    }


    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);

        if ( $war  == null || $this->getUser()->getClan()->getId() != $war->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }


        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new WarType(), $war );

        if ($form->handleRequest($request)->isValid())
        {
            $start = clone $war->getStart();
            $war->setEnd($start->modify('+2 day'));
            $em->persist($war);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_wars', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:WarAdmin:edit.html.twig', array( 'clan'=> $clan,
            'form'      =>  $form->createView(),
            'player'  => $war
        ));
    }


    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);

        if ( $war  == null || $this->getUser()->getClan()->getId() != $war->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $war = $em->getRepository('COCBundle:War')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$war || $this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('No war found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($war);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_wars', array('id_clan' =>  $clan->getId())));

    }




}
