<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageBestAttack
 *
 * @ORM\Table(name="imagebestattack")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ImageBestAttackRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ImageBestAttack
{
    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="imageBestAttacks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="integer")
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir", type="integer")
     */
    private $elixir;


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\OneToOne(targetEntity="COC\COCBundle\Entity\Image", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

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
     * Set name
     *
     * @param string $name
     * @return Image
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
     * Set gold
     *
     * @param integer $gold
     * @return Image
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get gold
     *
     * @return integer 
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set elexir
     *
     * @param integer $elexir
     * @return Image
     */
    public function setElexir($elexir)
    {
        $this->elexir = $elexir;

        return $this;
    }

    /**
     * Get elexir
     *
     * @return integer 
     */
    public function getElexir()
    {
        return $this->elexir;
    }

    /**
     * Set elixir
     *
     * @param integer $elixir
     * @return ImageBestAttack
     */
    public function setElixir($elixir)
    {
        $this->elixir = $elixir;

        return $this;
    }

    /**
     * Get elixir
     *
     * @return integer 
     */
    public function getElixir()
    {
        return $this->elixir;
    }

    /**
     * @ORM\PrePersist
     */
    public function updateDate()
    {
        $this->setCreatedAt(new \Datetime());
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Player
     */
    public function setCreatedAt($updatedAt)
    {
        $this->createdAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }



}
