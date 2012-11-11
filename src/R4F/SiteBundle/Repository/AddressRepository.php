<?php

namespace R4F\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AddressRepository extends EntityRepository
{
    public function getStartPointQueryBuilder($course_id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('a')
          ->from('R4FSiteBundle:Address', 'a')
          ->innerJoin('a.map', 'map', 'WITH', 'map.course_id = :course_id')
          ->setParameter('course_id', $course_id)
       ;

       return $qb;
    }

    public function getStartPointQuery($course_id)
    {
        $qb = $this->getStartPointQueryBuilder($course_id);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getStartPoint($course_id)
    {
        $q = $this->getStartPointQuery($course_id);

        return is_null($q) ? array() : $q->getResult();
    }
}
