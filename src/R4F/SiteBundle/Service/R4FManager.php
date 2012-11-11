<?php

namespace R4F\SiteBundle\Service;

use R4F\SiteBundle\Entity\Subscription;
use R4F\SiteBundle\Entity\Course;
use Doctrine\ORM\EntityManager;


class R4FManager
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function getName()
    {
        return 'R4FManager';
    }

    public function isCourseSubscriber($user, $course)
    {  
        $subscription = $this->getEntityManager()
            ->getRepository('R4FSiteBundle:Subscription')
            ->findOneBy(array(
                'user' => $user->getId(),
                'course' => $course->getId()
            ))
        ;

        return !is_null($subscription);
    }
}


