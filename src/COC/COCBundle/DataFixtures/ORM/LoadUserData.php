<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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

    public function load(ObjectManager $manager)
    {

        $userManager = $this->container->get('fos_user.user_manager');

        $user1 = $userManager->createUser();
        $user1->setUsername('admin');
        $user1->setEmail('admin@domain.com');
        $user1->setPlainPassword('admin');
        $user1->setEnabled(true);
        $user1->setRoles(array('ROLE_ADMIN'));

        $user2 = $userManager->createUser();
        $user2->setUsername('lu');
        $user2->setEmail('user@domain.com');
        $user2->setPlainPassword('lu');
        $user2->setEnabled(true);
        $user2->setPlayer($this->getReference('lu'));

        $user3 = $userManager->createUser();
        $user3->setUsername('pom');
        $user3->setEmail('pom@domain.com');
        $user3->setPlainPassword('pom');
        $user3->setEnabled(true);
        $user3->setPlayer($this->getReference('pom'));

        $user4 = $userManager->createUser();
        $user4->setUsername('seyaa');
        $user4->setEmail('seyaa@domain.com');
        $user4->setPlainPassword('seyaa');
        $user4->setEnabled(true);
        $user4->setPlayer($this->getReference('seyaa'));

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}