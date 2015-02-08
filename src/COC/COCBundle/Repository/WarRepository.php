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
    public function getWarInProgress($clan)
    {
        $now = new \DateTime();
        // $now = new \DateTime('Y-m-d H:i:s');
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.start <= :now')
            ->andWhere('u.end >= :now')
            ->andWhere('u.clan = :clan')
            ->orderBy('u.id', 'DESC')
            ->setParameter('clan', $clan)
           ->setParameter('now', $now);

        $query = $qb->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getNextWar($clan)
    {
        $now = new \DateTime();

        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.start >= :now')
            ->andWhere('u.clan = :clan')
            ->orderBy('u.id', 'DESC')
            ->setParameter('clan', $clan)
            ->setParameter('now', $now)
            ->setMaxResults( 1 );

        return $qb->getQuery()->getResult();

    }
    public function getNumberEntities($clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.clan = :clan')
            ->select('u')
            ->setParameter('clan', $clan);

        return count($qb->getQuery()->getResult());
    }




}
