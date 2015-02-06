<?php

namespace COC\COCBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
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
                $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
            }
            else
            {
                echo "season !!!= season actuelle";
               // $players = $em->getRepository('COCBundle:PlayerHistory')->findAll();
                $players = $em->getRepository('COCBundle:PlayerHistory')->findOneBySeason($season);
            }

            if(!empty($players))
            {
                return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
            }
            else
            {
                return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
        if ($players)
        {
            return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
        }
        else
        {
            return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'form' => $form->createView() , 'players' => null));
        }

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

    public function editAction (Request $request, $id_clan)
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->findOneByUser($userId);
        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_players', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:Player:edit.html.twig', array('clan' =>  $clan,
                'form'      =>  $form->createView(),
                'player'  => $player
        ));
    }

    public function historyPlayersAction ($number)
    {
        $em = $this->getDoctrine()->getManager();
        $histories = $em->getRepository('COCBundle:Player')->getHistory($number);

        return $this->render('COCBundle:Player:historyPlayers.html.twig', array(
            'histories'      =>  $histories,
        ));
    }

}
