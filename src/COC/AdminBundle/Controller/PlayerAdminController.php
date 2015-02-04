<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Form\Type\SeasonType;
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

    public function indexAction(Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new SeasonType(), null);
        // $calculateInfosService = $this->container->get('coc_cocbundle.calculate_player_info') ;
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($request->isMethod('POST'))
        {
            $seasonActuel = $em->getRepository('COCBundle:Season')->getActualSeason();
            $data = $request->request->all();
            $idSeason = $data['season']['season'];

            if(empty($idSeason)){
                $idSeason = 0 ;
            }
            $data = $request->request->all();
            $idSeason = $data['season']['season'];
            $season = $em->getRepository('COCBundle:Season')->findOneById($idSeason);

            if($season == $seasonActuel)
            {
                echo "season = season actuelle";
                $players = $em->getRepository('COCBundle:Player')->getAllPlayers();
            }
            else
            {
                echo "season !!!= season actuelle";
                // $players = $em->getRepository('COCBundle:PlayerHistory')->findAll();
                $players = $em->getRepository('COCBundle:PlayerHistory')->findOneBySeason($season);
            }

            if(!empty($players))
            {
                return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
            }
            else
            {
                return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan ,'players' => $players , 'form' => $form->createView() ));
            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
        if ($players)
        {
            return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan ,'players' => $players , 'form' => $form->createView() ));
        }
        return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('clan' => $clan ,'players' => $players));
    }

    public function addAction (Request $request, $id_clan)
    {
        $player = new Player();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new PlayerAdminType(), $player);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $player->setClan($clan);
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
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players', array('id_clan' =>  $clan->getId())));
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
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

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
