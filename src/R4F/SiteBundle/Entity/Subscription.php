<?php

namespace R4F\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="R4F\SiteBundle\Repository\SubscriptionRepository")
 * @ORM\Table(name="subscription")
 */
class Subscription
{
   /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="R4F\RunnerBundle\Entity\User", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	private $user;
	
	/**
	 * @ORM\ManyToOne(targetEntity="R4F\SiteBundle\Entity\Course", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	private $course;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param R4F\RunnerBundle\Entity\User $user
     */
    public function setUser(\R4F\RunnerBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return R4F\RunnerBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set course
     *
     * @param R4F\SiteBundle\Entity\Course $course
     */
    public function setCourse(\R4F\SiteBundle\Entity\Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get course
     *
     * @return R4F\SiteBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
