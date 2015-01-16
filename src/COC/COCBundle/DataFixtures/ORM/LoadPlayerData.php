<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use COC\COCBundle\Entity\Player;


class LoadPlayerData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $player1 = new Player();
        $player1->setName("Seyaa");
        $manager->persist($player1);

        $player2 = new Player();
        $player2->setName("Lu");
        $manager->persist($player2);


        $player3 = new Player();
        $player3->setName("Pom");
        $manager->persist($player3);

        $manager->flush();

        $this->addReference('seyaa', $player1);
        $this->addReference('lu', $player2);
        $this->addReference('pom', $player3);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}