<?php

namespace COC\COCBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use COC\COCBundle\Entity\CategoryImage;


class LoadCategoryImageData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $categoryImage1 = new CategoryImage();
        $categoryImage1->setName('Best attacks');

        $categoryImage2 = new CategoryImage();
        $categoryImage2->setName('Worst attacks');

        $categoryImage3 = new CategoryImage();
        $categoryImage3->setName('Funny images');

        $manager->persist($categoryImage1);
        $manager->persist($categoryImage2);
        $manager->persist($categoryImage3);

        $manager->flush();

        $this->addReference('categoryImage1', $categoryImage1);
        $this->addReference('categoryImage2', $categoryImage1);
        $this->addReference('categoryImage3', $categoryImage3);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}