<?php

namespace COC\COCBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\PlayerType;
use COC\COCBundle\Form\Type\ActivityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityManager;

class PlayerController extends Controller
{
    public function indexAction(Request $request, $id_clan, $type)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $actualSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $form = $this->createForm(new SeasonType($clan, $actualSeason,  $em));

     //   $form = $this->get('form.factory')->create(new SeasonType($clan, $actualSeason, $this->getDoctrine()->getEntityManager());
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
                $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
            }
            else
            {
                $players = $em->getRepository('COCBundle:PlayerHistory')->findBySeason($season, $clan);
            }

            if(!empty($players))
            {
                if ( $type == 0)
                    return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
                else
                    return $this->render('COCBundle:Player:activity.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
            }
            else
            {
                if ( $type == 0)
                    return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => null , 'form' => $form->createView() ));
                else
                    return $this->render('COCBundle:Player:activity.html.twig', array('clan' => $clan, 'players' => null , 'form' => $form->createView() ));            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers($clan);
        if ($players)
        {
            if ( $type == 0)
                return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
            else
                return $this->render('COCBundle:Player:activity.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));        }
        else
        {
            if ( $type == 0)
                return $this->render('COCBundle:Player:index.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));
            else
                return $this->render('COCBundle:Player:activity.html.twig', array('clan' => $clan, 'players' => $players , 'form' => $form->createView() ));        }

    }


    public function editActivityAction (Request $request, $id_clan)
    {
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan) ;
        $user = $this->getUser();

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->findOneBy(array('user' => $user , 'clan' => $clan ));

        $form = $this->get('form.factory')->create(new ActivityType(), $player);

        if ($form->handleRequest($request)->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            return $this->redirect($this->generateUrl('coc_players', array('id_clan' => $clan->getId(), 'type' => 1)));
        }

        return $this->render('COCBundle:Player:editActivity.html.twig', array( 'clan' => $clan,
            'form'      =>  $form->createView(),
            'player'  => $player
        ));
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
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        if($user == null)
        {
            throw $this->createNotFoundException('Page not found');
        }

        $user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->findOneByUser($userId);
        $form = $this->get('form.factory')->create(new PlayerType(), $player );




        if ( $this->getUser() == null && $clan->getPrivacy() == 1)
            throw $this->createNotFoundException('This page does not exist.');

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_players', array('type' => 0, 'id_clan' =>  $clan->getId())));
        }

        return $this->render('COCBundle:Player:edit.html.twig', array('clan' =>  $clan,
                'form'      =>  $form->createView(),
                'player'  => $player
        ));
    }

    public function historyPlayersAction ($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $players = $em->getRepository('COCBundle:Player')->getAllPlayersModule($clan);

        return $this->render('COCBundle:Player:historyPlayers.html.twig', array( 'clan'      =>  $clan,
            'players'      =>  $players,
        ));
    }

    public function editHistoryPlayersAction ($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);
        $players = $em->getRepository('COCBundle:Player')->getAllPlayersModule($clan);

        return $this->render('COCBundle:Player:historyPlayers.html.twig', array( 'clan'      =>  $clan,
            'players'      =>  $players,
        ));
    }

}
