<?php

namespace R4F\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="R4F\SiteBundle\Repository\MessageRepository")
 * @ORM\Table(name="message")
 */
class Message
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
    private $text;
	
	/**
	 * @ORM\ManyToOne(targetEntity="R4F\RunnerBundle\Entity\User", inversedBy="messages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	private $user;
	
	/**
	 * @ORM\ManyToOne(targetEntity="R4F\SiteBundle\Entity\Course", inversedBy="messages")
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
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set user
     *
     * @param R4F\RunnerBundle\Entity\User $user
     */
    public function setUser(\R4F\UserBundle\Entity\User $user)
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
