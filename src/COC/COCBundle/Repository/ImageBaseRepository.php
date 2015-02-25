<?php

namespace COC\COCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageBaseRepository extends EntityRepository
{
    public function getNumberEntities($clan, $ht)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.clan = :clan')
            ->andWhere('u.hall_town = :ht')
            ->setParameter('clan', $clan)
            ->setParameter('ht', $ht);

        return count($qb->getQuery()->getResult());
    }
}
