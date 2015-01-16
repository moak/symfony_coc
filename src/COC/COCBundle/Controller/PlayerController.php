<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new SeasonType(), null);
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST'))
        {
            $data = $request->request->all();
            $season = $data['season'];

            $em = $this->getDoctrine()->getManager();

            $players = $em->getRepository('COCBundle:PlayerHistory')->findAll();

            foreach($players as $key => $value) {
                $totals[$key]['attack'] = $this->getTotalAttack($value);
                $totals[$key]['defence'] = $this->getTotalDefence($value);
            }

            return $this->render('COCBundle:Player:index.html.twig', array('players' => $players, 'totals' => $totals, 'form' => $form->createView()));
        }


        $players = $em->getRepository('COCBundle:Player')->findAll();

        if ($players)
        {
            foreach($players as $key => $value) {
                $totals[$key]['attack'] = $this->getTotalAttack($value);
                $totals[$key]['defence'] = $this->getTotalDefence($value);
            }
            return $this->render('COCBundle:Player:index.html.twig', array('players' => $players , 'totals' => $totals,'form' => $form->createView() ));
        }


        return $this->render('COCBundle:Player:index.html.twig', array('players' => $players));
    }

    public function getScore($score)
    {
        $tmp = $score - 1;
        $tmp = $tmp * $score;
        $tmp = $tmp / 2;
        return $tmp;
    }
    private function getTotalAttack($player)
    {
        $total = $this->getScore($player->getArcher()) +
        $this->getScore($player->getBarbar() )+
        $this->getScore($player->getGeant()) +
        $this->getScore($player->getWizard()) +
        $this->getScore($player->getDragon()) +
        $this->getScore($player->getWallBreaker()) +
        $this->getScore( $player->getPekka()) +
        $this->getScore( $player->getBallon()) +
        $this->getScore( $player->getHealer()) +
        $this->getScore(  $player->getGobelin()) +
        $this->getScore(  $player->getPotionHeal()) +
        $this->getScore(  $player->getPotionDamage()) +
        $this->getScore( $player->getPotionBoost()) +
        $this->getScore(  $player->getPotionGreen());

        return $total;
    }

    private function getTotalDefence($player)
    {
        return
            $this->getScore($player->getCanon1()) +  $this->getScore($player->getCanon2()) + $this->getScore($player->getCanon3()) +  $this->getScore($player->getCanon4()) + $this->getScore($player->getCanon5()) +
            $this->getScore($player->getMortar1()) +  $this->getScore($player->getMortar2()) + $this->getScore($player->getMortar3()) + $this->getScore($player->getMortar4()) +
            $this->getScore($player->getTesla1()) + $this->getScore($player->getTesla2()) + $this->getScore($player->getTesla3()) +
            $this->getScore($player->getTowerMagic1()) + $this->getScore($player->getTowerMagic2()) + $this->getScore($player->getTowerMagic3()) + $this->getScore($player->getTowerMagic4()) +
            $this->getScore($player->getTowerArcher1()) + $this->getScore($player->getTowerArcher2()) + $this->getScore($player->getTowerArcher3()) + $this->getScore($player->getTowerArcher4()) + $this->getScore($player->getTowerArcher5()) +
            $this->getScore($player->getKing()) +$this->getScore( $player->getQueen());
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

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:Player')->findOneByUser($id);
        $player = $em->getRepository('COCBundle:Player')->find($id);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $playerHistory = new PlayerHistory();
            $playerHistory->setPlayer($player);
            $playerHistory->setName($player->getName());
            $playerHistory->setTrophy($player->getTrophy());
            $playerHistory->setLevel($player->getLevel());
            $playerHistory->setTroopSent($player->getTroopSent());

            $em = $this->getDoctrine()->getManager();
            $season = $em->getRepository('COCBundle:Season')->findOneById('1');

            $playerHistory->setSeason($season);

            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->persist($playerHistory);

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
