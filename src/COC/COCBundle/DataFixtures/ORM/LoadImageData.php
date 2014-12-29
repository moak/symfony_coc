<?php

namespace COC\COCBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use COC\COCBundle\Entity\Image;


class LoadImageData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $img1 = new Image();

        $img1->setAlt('best attack ever');
        $img1->setPath('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSE0LF-OQQHIgiyPvU4M-5N1cBHPdgxqD7k6K5dMKOe5UbR4N2v5w');
        $img1->setUser($this->getReference('user1'));
        $img1->setCategoryImage($this->getReference('categoryImage1'));

        $manager->persist($img1);


        $manager->flush();

        $this->addReference('img1', $img1);

    }

    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}