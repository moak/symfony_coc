<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Form\Type\SeasonType;
use COC\COCBundle\Form\Type\PlayerHistoryType;
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

    public function indexAction(Request $request, $id_clan, $type)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new SeasonType($clan), null);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($request->isMethod('POST'))
        {
            $seasonActuel = $em->getRepository('COCBundle:Season')->getActualSeason();
            $data = $request->request->all();
            $idSeason = $data['season']['season'];

            if(empty($idSeason)){
                $idSeason = 0 ;
            }

            $season = $em->getRepository('COCBundle:Season')->findOneById($idSeason);

            if($season == $seasonActuel)
            {
                $type = 1;
                $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
            }
            else
            {
                $type = 0;
                $players = $em->getRepository('COCBundle:PlayerHistory')->findBySeason($season, $clan);
            }

            if(!empty($players))
            {
                if ($type == 1)
                    return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('type' => $type, 'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
                else
                    return $this->render('AdminBundle:PlayerAdmin:history.html.twig', array('type' => $type,'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));

            }
            else
            {
                if ($type == 1)
                    return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('type' => $type, 'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
                else
                    return $this->render('AdminBundle:PlayerAdmin:history.html.twig', array('type' => $type, 'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
        if ($players)
        {
            if ($type == 1)
                return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('type' => '1', 'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
            else
                return $this->render('AdminBundle:PlayerAdmin:history.html.twig', array('type' => '1', 'clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
        }
        if ($type == 1)
            return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('type' => '1','clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
        else
            return $this->render('AdminBundle:PlayerAdmin:history.html.twig', array('type' => '1','clan' => $clan , 'players' => $players , 'form' => $form->createView() ));
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
            return $this->redirect($this->generateUrl('admin_players', array('type' => '1','id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:PlayerAdmin:edit.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
            'player'  => $player
        ));
    }


    public function editHistoryAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $playerHistory = $em->getRepository('COCBundle:PlayerHistory')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new PlayerHistoryType(), $playerHistory );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($playerHistory);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players', array('type' => '0', 'id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:PlayerAdmin:editHistory.html.twig', array('clan' => $clan ,
            'form'      =>  $form->createView(),
            'player'  => $playerHistory
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
