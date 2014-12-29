<?php

namespace COC\COCBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use COC\COCBundle\Entity\Season;


class LoadSeasonData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $dt = new \DateTime("now");
        $season1 = new Season();
        $season1->setStart($dt);
        $season1->setEnd($dt);
        $season1->setName('Season 1');

        $season2 = new Season();
        $season2->setStart($dt);
        $season2->setEnd($dt);
        $season2->setName('Season 2');

        $manager->persist($season1);
        $manager->persist($season2);

        $manager->flush();

        $this->addReference('season1', $season1);
        $this->addReference('season2', $season2);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}