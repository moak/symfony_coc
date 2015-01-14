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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('COCBundle:Player')->findAll();

        if ($players)
        {
            foreach($players as $key => $value) {
                $totals[$key]['attack'] = $this->getTotalAttack($value);
                $totals[$key]['defence'] = $this->getTotalDefence($value);
            }
            return $this->render('COCBundle:Player:index.html.twig', array('players' => $players , 'totals' => $totals));
        }
        return $this->render('COCBundle:Player:index.html.twig', array('players' => $players));
    }

    private function getTotalAttack($player)
    {
        return $player->getArcher() +
        $player->getBarbar() +
        $player->getGeant() +
        $player->getWizard() +
        $player->getDragon() +
        $player->getWallBreaker() +
        $player->getPekka() +
        $player->getBallon() +
        $player->getHealer() +
        $player->getGobelin() +
        $player->getPotionHeal() +
        $player->getPotionDamage() +
        $player->getPotionBoost() +
        $player->getPotionGreen();
    }

    private function getTotalDefence($player)
    {
        return  $player->getCanon1() +  $player->getCanon2() + $player->getCanon3() +  $player->getCanon4() +
        $player->getMortar1() +  $player->getMortar2() + $player->getMortar3() +$player->getMortar4() +
        $player->getTesla1() + $player->getTesla2() + $player->getTesla3() +
        $player->getTowerMagic1() + $player->getTowerMagic2() + $player->getTowerMagic3() + $player->getTowerMagic4() +
        $player->getTowerArcher1() + $player->getTowerArcher2() + $player->getTowerArcher3() + $player->getTowerArcher4() +
        $player->getKing() + $player->getQueen();
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
            $em = $this->getDoctrine()->getManager();
            $player->setLastUpdate(new \DateTime());
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_players'));
        }

        return $this->render('COCBundle:Player:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'player'  => $player
        ));
    }

    public function historyPlayersAction ()
    {
        $em = $this->getDoctrine()->getManager();
        $histories = $em->getRepository('COCBundle:Player')->getHistory();

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
