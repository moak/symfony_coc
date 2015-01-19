<?php

namespace COC\COCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * WarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WarRepository extends EntityRepository
{
    public function getWarInProgress()
    {
        $now = new \DateTime();
        // $now = new \DateTime('Y-m-d H:i:s');
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.start <= :now')
            ->andWhere('u.end >= :now')
            ->orderBy('u.id', 'DESC')
           ->setParameter('now', $now);

        $query = $qb->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getNumberWars()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u');

        return count($qb->getQuery()->getResult());
    }

    public function getFutureWars()
    {
        $now = new \DateTime();

        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.start >= :now')
            ->orderBy('u.id', 'DESC')
            ->setParameter('now', $now);

        return $qb->getQuery()->getResult();
    }
}