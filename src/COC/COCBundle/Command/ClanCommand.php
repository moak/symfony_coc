<?php
namespace COC\COCBundle\Command;

use COC\COCBundle\Entity\PlayerHistory;
use COC\COCBundle\Entity\Clan;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
class ClanCommand extends ContainerAwareCommand
{
    protected function configure()
    {

        $this
            ->setName('coc:clanreset')
            ->setDescription('Update clans for a new season')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*$dialog = $this->getHelperSet()->get('dialog');
        if (!$dialog->askConfirmation($output, '<question>Do you confirm spamming our users?</question>', false)) {
            return;
        }*/


        // Inside execute function
        // $output->getFormatter()->setStyle('fcbarcelona', new OutputFormatterStyle('red', 'blue', array('blink', 'bold', 'underscore')));
        // $output->writeln('<fcbarcelona>Messi for the win</fcbarcelona>');

        $em = $this->getContainer()->get('doctrine')->getManager();
        $clans = $em->getRepository('COCBundle:Clan')->findAll();

        foreach ($clans as $clan)
        {
            $clan->setTotalTroopReceived(0);
            $clan->setTotalTroopSent(0);
            $clan->setTotalAttackWon(0);

            $em->persist($clan);
            $em->flush();
        }


        $output->writeln('<info>Clan reset succesfully</info>');
    }
}


