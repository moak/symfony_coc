<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use COC\COCBundle\Entity\Season;


class LoadSeasonData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $season1 = new Season();
        $season1->setName('Saison 1');
        $datetime = new DateTime();
        $datetime->setDate(2015,1,5);
        $datetime->setTime(6,0,0);

        $season1->setStart($datetime);
        $datetime = new DateTime();
        $datetime->setDate(2015,1,19);
        $datetime->setTime(6,0,0);
        $season1->setEnd($datetime);

        $season2 = new Season();
        $season2->setName('Saison 2');
        $datetime = new DateTime();
        $datetime->setDate(2015,1,19);
        $datetime->setTime(6,0,0);

        $season2->setStart($datetime);
        $datetime = new DateTime();
        $datetime->setDate(2015,2,2);
        $datetime->setTime(6,0,0);
        $season2->setEnd($datetime);


        $manager->persist($season1);
        $manager->persist($season2);

        $manager->flush();

        $this->addReference('season1', $season1);
        $this->addReference('season2', $season2);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}