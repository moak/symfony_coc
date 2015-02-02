<?php

namespace COC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Form\Type\SeasonType;
use COC\COCBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PlayerAdminController extends Controller
{
    public function listModuleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('COCBundle:Player')->findAll();

        if ($players)
        {
            foreach($players as $key => $value) {
                $totals[$key]['attack'] = $this->getTotalAttack($value);
                $totals[$key]['defence'] = $this->getTotalDefence($value);
            }
            return $this->render('AdminBundle:PlayerAdmin:listModule.html.twig', array('players' => $players , 'totals' => $totals));
        }

        return $this->render('AdminBundle:PlayerAdmin:listModule.html.twig', array('players' => $players));
    }

    public function indexAction(Request $request)
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
                return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
            }
            else
            {
                return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
            }
        }

        $players = $em->getRepository('COCBundle:Player')->getAllPlayers();
        if ($players)
        {
            return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('players' => $players , 'form' => $form->createView() ));
        }
        return $this->render('AdminBundle:PlayerAdmin:index.html.twig', array('players' => $players));
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

    public function addAction (Request $request)
    {
        $player = new Player();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new PlayerAdminType(), $player);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players'));
        }

        return $this->render('AdminBundle:PlayerAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }


    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('COCBundle:Player')->find($id);

        $form = $this->get('form.factory')->create(new PlayerType(), $player );

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_players'));
        }

        return $this->render('AdminBundle:PlayerAdmin:edit.html.twig', array(
            'form'      =>  $form->createView(),
            'player'  => $player
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

        return $this->redirect($this->generateUrl('admin_players'));
    }




}
