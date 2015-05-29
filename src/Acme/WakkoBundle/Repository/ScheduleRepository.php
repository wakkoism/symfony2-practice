<?php

namespace Acme\WakkoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Acme\WakkoBundle\Entity\Schedule;

/**
 *
 */
class ScheduleRepository extends EntityRepository
{
    public function findLatest($limit = Schedule::NUM_ITEMS)
    {
        $query = $this
            ->createQueryBuilder('s')
            ->select('s')
            ->where('s.scheduleTime <= :now')->setParameter('now', new \DateTime())
            ->orderBy('s.scheduleTime', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;

        return $query;
    }
}