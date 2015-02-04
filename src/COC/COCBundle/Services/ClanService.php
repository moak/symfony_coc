<?php

namespace COC\COCBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\SecurityContext as SecurityContext;
use Doctrine\ORM\EntityManager;

class ClanService {

    protected $em;

    public function __construct( EntityManager $em) {
        $this->em = $em;
    }

    public function getClan($id)
    {
        $clan = $this->em->getRepository('COCBundle:Clan')->findOneBy(array('id' => $id));
        return $clan;
    }
}