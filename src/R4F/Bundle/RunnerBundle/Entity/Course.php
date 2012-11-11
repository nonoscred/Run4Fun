<?php

namespace R4F\Bundle\RunnerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="R4F\Bundle\RunnerBundle\Repository\CourseRepository")
 * @ORM\Table(name="course")
 */
class Course
{
   /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\MaxLength(limit=3, message="C'est plus du Fun au delas de 1000km !")
     */
    protected $length;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $meeting_point;	

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="course")
     */
    protected $messages;

    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="course")
     */
    protected $subscriptions;

    /**
     * @ORM\OneToMany(targetEntity="Map", mappedBy="course")
     */
    protected $maps;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->maps = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return Course
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return string 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set meeting_point
     *
     * @param string $meetingPoint
     * @return Course
     */
    public function setMeetingPoint($meetingPoint)
    {
        $this->meeting_point = $meetingPoint;
    
        return $this;
    }

    /**
     * Get meeting_point
     *
     * @return string 
     */
    public function getMeetingPoint()
    {
        return $this->meeting_point;
    }

    /**
     * Add messages
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Message $messages
     * @return Course
     */
    public function addMessage(\R4F\Bundle\RunnerBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Message $messages
     */
    public function removeMessage(\R4F\Bundle\RunnerBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add subscriptions
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Subscription $subscriptions
     * @return Course
     */
    public function addSubscription(\R4F\Bundle\RunnerBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions[] = $subscriptions;
    
        return $this;
    }

    /**
     * Remove subscriptions
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Subscription $subscriptions
     */
    public function removeSubscription(\R4F\Bundle\RunnerBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions->removeElement($subscriptions);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Add maps
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Map $maps
     * @return Course
     */
    public function addMap(\R4F\Bundle\RunnerBundle\Entity\Map $maps)
    {
        $this->maps[] = $maps;
    
        return $this;
    }

    /**
     * Remove maps
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Map $maps
     */
    public function removeMap(\R4F\Bundle\RunnerBundle\Entity\Map $maps)
    {
        $this->maps->removeElement($maps);
    }

    /**
     * Get maps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaps()
    {
        return $this->maps;
    }
}