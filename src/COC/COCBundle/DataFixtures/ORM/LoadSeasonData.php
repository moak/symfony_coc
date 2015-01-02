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
        //$dt = new \DateTime("now");
       /* $god_birth = '2014-12-22 06:00:00';

        $dateStart1 = new \DateTime($god_birth);
        $dateEnd1 = $dateStart1->modify('+7 day');
        $season1 = new Season();
        $season1->setStart($dateStart1);
        $season1->setEnd($dateStart1->modify('+7 day'));
        $season1->setName('Season 1');

        $dateStart2 = $dateStart1;
        $dateEnd2 = $dateStart2->modify('+7 day');

        $season2 = new Season();
        $season2->setStart($dateStart2);
        $season2->setEnd($dateEnd2);
        $season2->setName('Season 20');

        $manager->persist($season1);
        $manager->persist($season2);

        $manager->flush();

        $this->addReference('season1', $season1);
        $this->addReference('season2', $season2);*/
    }

    public function getOrder()
    {
     //   return 2; // the order in which fixtures will be loaded
    }
}