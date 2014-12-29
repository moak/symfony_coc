<?php

namespace COC\COCBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use COC\COCBundle\Entity\UserInfo;


class LoadUserInfoData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $userInfo1 = new UserInfo();
        $userInfo1->setAttackWon('20');
        $userInfo1->setHallTown('8');
        $userInfo1->setLevel('60');
        $userInfo1->setTroopReceived('120');
        $userInfo1->setTroopSent('123');
        $userInfo1->setTrophy('1120');
        $userInfo1->setUser($this->getReference('user1'));
        $userInfo1->setSeason($this->getReference('season1'));

        $userInfo2 = new UserInfo();
        $userInfo2->setAttackWon('20');
        $userInfo2->setHallTown('8');
        $userInfo2->setLevel('60');
        $userInfo2->setTroopReceived('220');
        $userInfo2->setTroopSent('223');
        $userInfo2->setTrophy('2220');
        $userInfo2->setUser($this->getReference('user2'));
        $userInfo2->setSeason($this->getReference('season1'));

        $manager->persist($userInfo1);
        $manager->persist($userInfo2);


        $manager->flush();

        $this->addReference('userInfo1', $userInfo1);
        $this->addReference('userInfo2', $userInfo2);

    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}