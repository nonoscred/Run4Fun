<?php

namespace R4F\Bundle\RunnerBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="R4F\Bundle\RunnerBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phone_number;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthdate;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    protected $sex;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="users")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    protected $level;

    /**
     * @ORM\ManyToOne(targetEntity="Aim", inversedBy="users")
     * @ORM\JoinColumn(name="aim_id", referencedColumnName="id")
     */
    protected $aim;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="users", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * @Assert\Type(type="R4F\Bundle\RunnerBundle\Entity\Address")
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    protected $messages;

    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="user")
     */
    protected $subscriptions;

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
     * Set phone_number
     *
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;
    
        return $this;
    }

    /**
     * Get phone_number
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set level
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Level $level
     * @return User
     */
    public function setLevel(\R4F\Bundle\RunnerBundle\Entity\Level $level = null)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return \R4F\Bundle\RunnerBundle\Entity\Level 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set aim
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Aim $aim
     * @return User
     */
    public function setAim(\R4F\Bundle\RunnerBundle\Entity\Aim $aim = null)
    {
        $this->aim = $aim;
    
        return $this;
    }

    /**
     * Get aim
     *
     * @return \R4F\Bundle\RunnerBundle\Entity\Aim 
     */
    public function getAim()
    {
        return $this->aim;
    }

    /**
     * Set address
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Address $address
     * @return User
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

    /**
     * Add messages
     *
     * @param \R4F\Bundle\RunnerBundle\Entity\Message $messages
     * @return User
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
     * @return User
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
}
