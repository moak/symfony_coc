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
                return $this->render('COCBundle:Player:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
            }
            else
            {
                return $this->render('COCBundle:Player:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers();
        if ($players)
        {
            return $this->render('COCBundle:Player:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
        }
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

    public function editAction (Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->findOneByUser($userId);
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

    public function historyPlayersAction ($number)
    {
        $em = $this->getDoctrine()->getManager();
        $histories = $em->getRepository('COCBundle:Player')->getHistory($number);

        return $this->render('COCBundle:Player:historyPlayers.html.twig', array(
            'histories'      =>  $histories,
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
            $player->setLastUpdate(new \DateTime());
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
