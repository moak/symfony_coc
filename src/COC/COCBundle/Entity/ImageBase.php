<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageBase
 *
 * @ORM\Table(name="imagebase")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ImageBaseRepository")
 */
class ImageBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="imagebases")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Clan", inversedBy="imagebases")
     * @ORM\JoinColumn(name="clan_id", referencedColumnName="id")
     */
    private $clan;


    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Image", inversedBy="imagebases", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $image;


    /**
     * @ORM\Column(type="integer")
     */
    private $hall_town;


    /**
     * @ORM\Column(type="integer")
     */
    private $type;



    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Video
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
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
     * Set hall_town
     *
     * @param integer $hallTown
     * @return ImageBase
     */
    public function setHallTown($hallTown)
    {
        $this->hall_town = $hallTown;

        return $this;
    }

    /**
     * Get hall_town
     *
     * @return integer 
     */
    public function getHallTown()
    {
        return $this->hall_town;
    }


    /**
     * Set hall_town
     *
     * @param integer $type
     * @return ImageBase
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set image
     *
     * @param \COC\COCBundle\Entity\Image $image
     * @return ImageBase
     */
    public function setImage(\COC\COCBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \COC\COCBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set clan
     *
     * @param \COC\COCBundle\Entity\Clan $clan
     * @return ImageBase
     */
    public function setClan(\COC\COCBundle\Entity\Clan $clan = null)
    {
        $this->clan = $clan;

        return $this;
    }

    /**
     * Get clan
     *
     * @return \COC\COCBundle\Entity\Clan 
     */
    public function getClan()
    {
        return $this->clan;
    }
}
