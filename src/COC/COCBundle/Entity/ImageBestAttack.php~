<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ImageBestAttack
 *
 * @ORM\Table(name="imagebestattack")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ImageBestAttackRepository")
 */
class ImageBestAttack
{
    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Clan", inversedBy="imagebestattacks")
     * @ORM\JoinColumn(name="clan_id", referencedColumnName="id")
     */
    private $clan;


    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="imagebestattacks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;


    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Player
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Player
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="integer", nullable=true)
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="elixir", type="integer", nullable=true)
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
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Image", inversedBy="imagebestattacks", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
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
     * Set clan
     *
     * @param \COC\COCBundle\Entity\Clan $clan
     * @return ImageBestAttack
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

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return ImageBestAttack
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}
