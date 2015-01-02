<?php

namespace User\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use User\UserBundle\Entity\User;


class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('admin');
        $user1->getSalt(md5(uniqid()));
        $user1->setEmail('barbot.max@gmail.com');
        $user1->setPlainPassword('admin');
        $user1->setEnabled(true);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user1);

        $user1->setPassword($encoder->encodePassword('secret', $user1->getSalt()));


        $manager->persist($user1);
        $manager->flush();



        $userManager = $this->container->get('fos_user.user_manager');

        $userAdmin = $userManager->createUser();

        $userAdmin->setUsername('System');
        $userAdmin->setEmail('system@example.com');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEnabled(true);
        $userAdmin->getSalt(md5(uniqid()));

        $userManager->updateUser($userAdmin, true);


        $this->addReference('user1', $user1);
        $this->addReference('user2', $userAdmin);
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}