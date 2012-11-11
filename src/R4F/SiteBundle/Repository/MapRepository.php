<?php

namespace R4F\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MapRepository extends EntityRepository
{
    public function getStartPointQueryBuilder($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('a')
          ->from('R4FSiteBundle:Address', 'a')
          ->innerJoin('a.R4FSiteBundle:Map', 'map', 'WITH', 'map.course = :course_id')
          ->setParameter('course_id', $id)
          ->where('R4FSiteBundle:Map.priority = ?0')
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
	
	    public function AddressStart($id)
    {
        $query = $this->_em->createQuery('SELECT a FROM R4FSiteBundle:Address a, R4FSiteBundle:Map m WHERE a.id = m.address AND m.priority = 0 and m.course = :course_id')
		->setParameter('course_id', $id)
		;	
        $resultats = $query->getResult();

        return $resultats;
    }
	
	    public function AddressEnd($id)
    {
        $query = $this->_em->createQuery('SELECT a FROM R4FSiteBundle:Address a, R4FSiteBundle:Map m WHERE a.id = m.address AND m.priority = 1 and m.course = :course_id')
		->setParameter('course_id', $id)
		;
        $resultats = $query->getResult();

        return $resultats;
    }	
}
