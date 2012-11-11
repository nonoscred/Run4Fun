<?php

namespace R4F\Bundle\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="R4F\Bundle\SiteBundle\Repository\PartnerRepository")
 * @ORM\Table(name="partner")
 * @ORM\HasLifecycleCallbacks
 */
class Partner
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image_path;

    /**
     * @Assert\File(maxSize="2000000")
     */
    protected $image;

    public function getAbsoluteImagePath()
    {
        return null === $this->image_path ? null : $this->getUploadRootDir().'/'.$this->image_path;
    }

    public function getImageWebPath()
    {
        return null === $this->image_path ? null : '/'.$this->getUploadDir().'/'.$this->image_path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/partners/';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->image) {
            // do whatever you want to generate a unique name
            $this->image_path = sha1(uniqid(mt_rand(), true)).'.'.$this->image->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->image) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->image->move($this->getUploadRootDir(), $this->image_path);

        unset($this->image);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsoluteImagePath()) {
            unlink($file);
        }
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
     * Set name
     *
     * @param string $name
     * @return Partner
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Partner
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set image_path
     *
     * @param string $imagePath
     * @return Partner
     */
    public function setImagePath($imagePath)
    {
        $this->image_path = $imagePath;
    
        return $this;
    }

    /**
     * Get image_path
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->image_path;
    }
}
