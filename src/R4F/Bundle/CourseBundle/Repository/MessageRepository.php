<?php

namespace R4F\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository
{
    public function getMessagesQueryBuilder($course_id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('m')
            ->from('R4FSiteBundle:Message', 'm')
            ->where('m.course = :course_id')
            ->setParameter('course_id', $course_id)
       ;

       return $qb;
    }

    public function getMessagesQuery($course_id)
    {
        $qb = $this->getMessagesQueryBuilder($course_id);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getMessages($course_id)
    {
        $q = $this->getMessagesQuery($course_id);

        return is_null($q) ? array() : $q->getResult();
    }
}
