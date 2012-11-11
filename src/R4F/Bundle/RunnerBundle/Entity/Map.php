<?php

namespace R4F\Bundle\RunnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="R4F\Bundle\RunnerBundle\Repository\MapRepository")
 * @ORM\Table(name="map")
 */
class Map
{
   /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $priority;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="maps")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $course;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="maps")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $address;

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
     * Set priority
     *
     * @param integer $priority
     * @return Map
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set course
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Course $course
     * @return Map
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

    /**
     * Set address
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Address $address
     * @return Map
     */
    public function setAddress(\R4F\Bundle\RunnerBundle\Entity\Address $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \R4F\Bundle\RunnerBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }
}