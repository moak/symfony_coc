<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use COC\COCBundle\Entity\UserInfo;
use COC\COCBundle\Entity\Season;


class LoadUserInfoData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $userInfo1 = new UserInfo();
        $userInfo1->setTroopSent(100);
        $userInfo1->setTrophy(1322);
        $userInfo1->setAttackWon(41);
        $userInfo1->setTroopReceived(451);
        $userInfo1->setPlayer($this->getReference('seyaa'));
        $userInfo1->setSeason($this->getReference('season1'));

        $userInfo2 = new UserInfo();
        $userInfo2->setTroopSent(120);
        $userInfo2->setTrophy(1122);
        $userInfo2->setAttackWon(31);
        $userInfo2->setTroopReceived(654);
        $userInfo2->setPlayer($this->getReference('seyaa'));
        $userInfo2->setSeason($this->getReference('season2'));


        $manager->persist($userInfo1);
        $manager->persist($userInfo2);


        $manager->flush();

        $this->addReference('userInfo1', $userInfo1);
        $this->addReference('userInfo2', $userInfo2);


    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}