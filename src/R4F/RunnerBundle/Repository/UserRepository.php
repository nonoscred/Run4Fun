<?php

namespace R4F\RunnerBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function countUsers()
    {
        $query = $this->_em->createQuery('SELECT COUNT(u) FROM R4FRunnerBundle:user u');

        return $query->getSingleScalarResult();
    }
}
