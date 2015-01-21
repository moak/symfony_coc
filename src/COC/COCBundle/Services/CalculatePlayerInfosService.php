<?php

namespace COC\COCBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\SecurityContext as SecurityContext;
use Doctrine\ORM\EntityManager;

class CalculatePlayerInfosService {

    protected $em;

    public function __construct( EntityManager $entityManager) {
        $this->em = $entityManager;
    }



    public function getScore($score)
    {
        if ( $score == 1)
        {
            $tmp = 1;
        }
        else
        {
            $tmp = $score - 1;
            $tmp = $tmp * $score;
            $tmp = $tmp / 2;
        }
        return $tmp;
    }
    public function getTotalAttack($player)
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

            $this->getScore(  $player->getMinion()) +
            $this->getScore(  $player->getRider()) +
            $this->getScore(  $player->getValkyrie()) +
            $this->getScore(  $player->getGolem()) +
            $this->getScore(  $player->getWitch()) +
            $this->getScore(  $player->getLava()) +

            $this->getScore(  $player->getKing()) +
            $this->getScore(  $player->getQueen()) +

            $this->getScore(  $player->getPotionHeal()) +
            $this->getScore(  $player->getPotionDamage()) +
            $this->getScore( $player->getPotionBoost()) +
            $this->getScore(  $player->getPotionGreen());
            $this->getScore(  $player->getPotionFreeze());

        return $total * 5;
    }

    public function getTotalDefence($player)
    {
        return
            $this->getScore($player->getCanon1()) +  $this->getScore($player->getCanon2()) + $this->getScore($player->getCanon3()) +  $this->getScore($player->getCanon4()) + $this->getScore($player->getCanon5()) + $this->getScore($player->getCanon6()) +
            $this->getScore($player->getTowerArcher1()) + $this->getScore($player->getTowerArcher2()) + $this->getScore($player->getTowerArcher3()) + $this->getScore($player->getTowerArcher4()) + $this->getScore($player->getTowerArcher5()) + $this->getScore($player->getTowerArcher6()) + $this->getScore($player->getTowerArcher7()) +
            $this->getScore($player->getTesla1()) + $this->getScore($player->getTesla2()) + $this->getScore($player->getTesla3()) + + $this->getScore($player->getTesla4()) +
            $this->getScore($player->getAirDefence1()) + $this->getScore($player->getAirDefence2()) + $this->getScore($player->getAirDefence3()) + + $this->getScore($player->getAirDefence4()) +
            $this->getScore($player->getMortar1()) +  $this->getScore($player->getMortar2()) + $this->getScore($player->getMortar3()) + $this->getScore($player->getMortar4()) +
            $this->getScore($player->getTowerMagic1()) + $this->getScore($player->getTowerMagic2()) + $this->getScore($player->getTowerMagic3()) + $this->getScore($player->getTowerMagic4()) +
            $this->getScore($player->getArcX1()) + $this->getScore($player->getArcX2()) + $this->getScore($player->getArcX3())+
            $this->getScore($player->getInferno1()) + $this->getScore($player->getInferno2()) +
            $this->getScore($player->getKing()) +$this->getScore( $player->getQueen());
    }

}