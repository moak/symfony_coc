<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="images")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\CategoryImage", inversedBy="images")
     * @ORM\JoinColumn(name="category_image_id", referencedColumnName="id")
     */
    protected $categoryImage;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;



    

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
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return Image
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set categoryImage
     *
     * @param \COC\COCBundle\Entity\CategoryImage $categoryImage
     * @return Image
     */
    public function setCategoryImage(\COC\COCBundle\Entity\CategoryImage $categoryImage = null)
    {
        $this->categoryImage = $categoryImage;

        return $this;
    }

    /**
     * Get categoryImage
     *
     * @return \COC\COCBundle\Entity\CategoryImage 
     */
    public function getCategoryImage()
    {
        return $this->categoryImage;
    }
}
