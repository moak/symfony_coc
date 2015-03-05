<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Form\Type\SeasonType;
use COC\COCBundle\Form\Type\PlayerActualSeasonType;
use COC\COCBundle\Form\Type\PlayerAdminType;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PlayerAdminController extends Controller
{
    public function listModuleAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);

        if ($players)
        {
            return $this->render('AdminBundle:PlayerAdmin:listModule.html.twig', array('clan' => $clan, 'players' => $players));
        }

        return $this->render('AdminBundle:PlayerAdmin:listModule.html.twig', array('clan' => $clan, 'players' => null));
    }


    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $actualSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $form = $this->get('form.factory')->create(new SeasonType($clan, $actualSeason), null);
        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);


        if ($players)
        {
            return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
        }
        else
            return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan , 'players' => null , 'form' => $form->createView() ));
    }


    public function indexPlayerActualSeasonAction($id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $em = $this->getDoctrine()->getManager();
        $actualSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
        $form = $this->get('form.factory')->create(new SeasonType($clan, $actualSeason), null);
        $players = $em->getRepository('COCBundle:Player')->findByClan($clan);

        if ($players)
        {
            return $this->render('AdminBundle:PlayerAdmin:indexPlayerActualSeason.html.twig', array('clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
        }
        else
            return $this->render('AdminBundle:PlayerAdmin:indexPlayerActualSeason.html.twig', array('clan' => $clan , 'players' => null , 'form' => $form->createView() ));
    }

    public function editPlayerActualSeasonAction ($id, Request $request, $id_clan)
    {

        if($this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new PlayerActualSeasonType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players_actual_season', array('type' => '1','id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:PlayerAdmin:editPlayerActualSeason.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
            'player'  => $player
        ));
    }



    public function addAction (Request $request, $id_clan)
    {
        $player = new Player();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new PlayerAdminType(), $player);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid() && $this->getUser()->getClan()->getId() == $id_clan)
        {
            $player->setClan($clan);
            $player->setTroopSent(0);
            $player->setTroopReceived(0);
            $player->setTrophy(0);
            $player->setAttackWon(0);
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:PlayerAdmin:add.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
        ));
    }



    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);

        if ( $player == null || $this->getUser()->getClan()->getId() != $player->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players', array('type' => '1','id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:PlayerAdmin:edit.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
            'player'  => $player
        ));
    }


    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);

        if ( $player == null || $this->getUser()->getClan()->getId() != $player->getClan()->getId() )
        {
            throw $this->createNotFoundException('Page not found');
        }

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$player || $this->getUser()->getClan()->getId() != $id_clan)
        {
            throw $this->createNotFoundException('Page not found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($player);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_players', array('id_clan' =>  $clan->getId())));
    }




}
