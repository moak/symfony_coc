<?php
namespace COC\COCBundle\Command;

use COC\COCBundle\Entity\PlayerHistory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
class ResetPlayerCommand extends ContainerAwareCommand
{
    protected function configure()
    {

        $this
            ->setName('coc:playerreset')
            ->setDescription('Reset players for a new season')
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
        $players = $em->getRepository('COCBundle:Player')->findAll();

        foreach ($players as $player)
        {
            $player->setTroopSent(0);
            $player->setTroopReceived(0);
            // $player->setTrophy(0);
            $player->setAttackWon(0);

            $player->setUpdatedAt(new \Datetime());
            $em->persist($player);
            $em->flush();
        }

        $output->writeln('<info>Players reset succesfully</info>');


    }
}


