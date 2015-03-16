<?php
namespace COC\COCBundle\Command;

use COC\COCBundle\Entity\PlayerHistory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
class PlayerCommand extends ContainerAwareCommand
{
    protected function configure()
    {

        $this
            ->setName('coc:player')
            ->setDescription('Update players for a new season')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*$dialog = $this->getHelperSet()->get('dialog');
        if (!$dialog->askConfirmation($output, '<question>Do you confirm spamming our users?</question>', false)) {
            return;
        }
        $output->writeln('<comment>Starting Newsletter process</comment>');
        $output->writeln('<info>Newsletter process ended succesfully</info>');*/

        // Inside execute function
        // $output->getFormatter()->setStyle('fcbarcelona', new OutputFormatterStyle('red', 'blue', array('blink', 'bold', 'underscore')));
        // $output->writeln('<fcbarcelona>Messi for the win</fcbarcelona>');

        $em = $this->getContainer()->get('doctrine')->getManager();
        $actualSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
        $players = $em->getRepository('COCBundle:Player')->findAll();


        $actualSeason = $em->getRepository('COCBundle:Season')->find(5);


        foreach ($players as $player)
        {

            $playerHistory = new PlayerHistory();

            $playerHistory->setTotal($player->getTotal());
            $playerHistory->setTotalAttack($player->getTotalAttack());
            $playerHistory->setTotalDefence($player->getTotalDefence());
            $playerHistory->setClan($player->getClan());
            $playerHistory->setSeason($actualSeason);
            $playerHistory->setName($player->getName());
            $playerHistory->setLevel($player->getLevel());
            $playerHistory->setHallTown($player->getHallTown());
            $playerHistory->setUpdatedAt(new \Datetime());

            $playerHistory->setPlayer($player);
            $playerHistory->setAttackWon($player->getAttackWon());
            $playerHistory->setTroopSent($player->getTroopSent());
            $playerHistory->setTroopReceived($player->getTroopReceived());

            $playerHistory->setTrophy($player->getTrophy());
            $playerHistory->setCanon1($player->getCanon1());
            $playerHistory->setCanon2($player->getCanon2());
            $playerHistory->setCanon3($player->getCanon3());
            $playerHistory->setCanon4($player->getCanon4());
            $playerHistory->setCanon5($player->getCanon5());
            $playerHistory->setCanon6($player->getCanon6());

            $playerHistory->setAirDefence1($player->getAirDefence1());
            $playerHistory->setAirDefence2($player->getAirDefence2());
            $playerHistory->setAirDefence3($player->getAirDefence3());
            $playerHistory->setAirDefence4($player->getAirDefence4());

            $playerHistory->setTesla1($player->getTesla1());
            $playerHistory->setTesla2($player->getTesla2());
            $playerHistory->setTesla3($player->getTesla3());
            $playerHistory->setTesla4($player->getTesla4());

            $playerHistory->setMortar1($player->getMortar1());
            $playerHistory->setMortar2($player->getMortar2());
            $playerHistory->setMortar3($player->getMortar3());
            $playerHistory->setMortar4($player->getMortar4());

            $playerHistory->setTowerArcher1($player->getTowerArcher1());
            $playerHistory->setTowerArcher2($player->getTowerArcher2());
            $playerHistory->setTowerArcher3($player->getTowerArcher3());
            $playerHistory->setTowerArcher4($player->getTowerArcher4());
            $playerHistory->setTowerArcher5($player->getTowerArcher5());
            $playerHistory->setTowerArcher6($player->getTowerArcher6());
            $playerHistory->setTowerArcher7($player->getTowerArcher7());

            $playerHistory->setTowerMagic1($player->getTowerMagic1());
            $playerHistory->setTowerMagic2($player->getTowerMagic2());
            $playerHistory->setTowerMagic3($player->getTowerMagic3());
            $playerHistory->setTowerMagic4($player->getTowerMagic4());


            $playerHistory->setArcx1($player->getArcx1());
            $playerHistory->setArcx2($player->getArcx2());
            $playerHistory->setArcx3($player->getArcx3());

            $playerHistory->setInferno1($player->getInferno1());
            $playerHistory->setInferno2($player->getInferno2());

            $playerHistory->setElixir1($player->getElixir1());
            $playerHistory->setElixir2($player->getElixir2());
            $playerHistory->setElixir3($player->getElixir3());
            $playerHistory->setElixir4($player->getElixir4());
            $playerHistory->setElixir5($player->getElixir5());
            $playerHistory->setElixir6($player->getElixir6());
            $playerHistory->setElixir7($player->getElixir7());

            $playerHistory->setGold1($player->getGold1());
            $playerHistory->setGold2($player->getGold2());
            $playerHistory->setGold3($player->getGold3());
            $playerHistory->setGold4($player->getGold4());
            $playerHistory->setGold5($player->getGold5());
            $playerHistory->setGold6($player->getGold6());
            $playerHistory->setGold7($player->getGold7());

            $playerHistory->setBarbar($player->getBarbar());
            $playerHistory->setArcher($player->getArcher());
            $playerHistory->setWallBreaker($player->getWallBreaker());
            $playerHistory->setGeant($player->getGeant());
            $playerHistory->setHealer($player->getHealer());
            $playerHistory->setGobelin($player->getGobelin());
            $playerHistory->setWizard($player->getWizard());
            $playerHistory->setDragon($player->getDragon());
            $playerHistory->setPekka($player->getPekka());
            $playerHistory->setKing($player->getKing());
            $playerHistory->setQueen($player->getQueen());
            $playerHistory->setMinion($player->getMinion());
            $playerHistory->setRider($player->getRider());
            $playerHistory->setGolem($player->getGolem());
            $playerHistory->setValkyrie($player->getValkyrie());
            $playerHistory->setLava($player->getLava());
            $playerHistory->setWitch($player->getWitch());
            $playerHistory->setBallon($player->getBallon());

            $playerHistory->setPotionBoost($player->getPotionBoost());
            $playerHistory->setPotionDamage($player->getPotionDamage());
            $playerHistory->setPotionFreeze($player->getPotionFreeze());
            $playerHistory->setPotionHeal($player->getPotionHeal());
            $playerHistory->setPotionGreen($player->getPotionGreen());


            $player->setTroopSent(0);
            $player->setTroopReceived(0);
           // $player->setTrophy(0);
            $player->setAttackWon(0);

            $player->setUpdatedAt(new \Datetime());
            $em->persist($player);
            $em->flush();


            // $output->writeln($playerHistory);
            $em->persist($playerHistory);
            $em->flush();

        }


    }
}


