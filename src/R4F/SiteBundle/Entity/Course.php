<?php

namespace R4F\SiteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use R4F\SiteBundle\Entity\Address;

/**
 * @ORM\Entity(repositoryClass="R4F\SiteBundle\Repository\CourseRepository")
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
    private $description;
	
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\MaxLength(limit=3, message="C'est plus du Fun au delas de 1000km !")
     */
    private $length;
	
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meeting_point;	
	
	/**
	 * @ORM\OneToMany(targetEntity="R4F\SiteBundle\Entity\Message", mappedBy="course")
	 */
	private $messages;
	
	/**
	 * @ORM\OneToMany(targetEntity="R4F\SiteBundle\Entity\Subscription", mappedBy="course")
	 */
	private $subscriptions;
	
	/**
     * @ORM\OneToMany(targetEntity="R4F\SiteBundle\Entity\Map", mappedBy="course")
     */
	private $map;
	
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
		$this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
		$this->map = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set length
     *
     * @param string $length
     */
    public function setLength($length)
    {
        $this->length = $length;
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
     * Add messages
     *
     * @param R4F\SiteBundle\Entity\Message $messages
     */
    public function addMessage(\R4F\SiteBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    }

    /**
     * Get messages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add subscriptions
     *
     * @param R4F\SiteBundle\Entity\Subscription $subscriptions
     */
    public function addSubscription(\R4F\SiteBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions[] = $subscriptions;
    }

    /**
     * Get subscriptions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Add map
     *
     * @param R4F\SiteBundle\Entity\Map $map
     */
    public function addMap(\R4F\SiteBundle\Entity\Map $map)
    {
        $this->map[] = $map;
    }

    /**
     * Get map
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set meeting_point
     *
     * @param string $meetingPoint
     */
    public function setMeetingPoint($meetingPoint)
    {
        $this->meeting_point = $meetingPoint;
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
}
