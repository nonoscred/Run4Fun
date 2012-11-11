<?php

namespace R4F\Bundle\RunnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="R4F\Bundle\RunnerBundle\Repository\SubscriptionRepository")
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $course;

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
     * @param \R4F\Bundle\RunnerBundle\Entity\User $user
     * @return Subscription
     */
    public function setUser(\R4F\Bundle\RunnerBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \R4F\Bundle\RunnerBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set course
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Course $course
     * @return Subscription
     */
    public function setCourse(\R4F\Bundle\RunnerBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \R4F\Bundle\RunnerBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}