<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Clan
 *
 * @ORM\Table(name="clan")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ClanRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Clan
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
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer" ))
     */
    private $capacity;


    /**
     * @var integer
     *
     * @ORM\Column(name="validated", type="integer" ))
     */
    private $validated;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;
    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;


    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true, nullable=true)
     */
    
    private $nameClan;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

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
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\Player", mappedBy="clan")
     **/
    private $players ;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\War", mappedBy="clan")
     **/
    private $wars ;

    /**
     * @ORM\OneToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", mappedBy="clan")
     **/
    private $users ;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBonus", mappedBy="clan")
     **/
    private $imagebonuses;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBestAttack", mappedBy="clan")
     **/
    private $imagebestattacks;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\Video", mappedBy="clan")
     **/
    private $videos;


    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBase", mappedBy="clan")
     **/
    private $imagebases;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $message;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    public function getValidated()
    {
        return $this->validated;
    }

    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Clan
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
     * Set description
     *
     * @param string $description
     * @return Clan
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
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add players
     *
     * @param \COC\COCBundle\Entity\Player $players
     * @return Clan
     */
    public function addPlayer(\COC\COCBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \COC\COCBundle\Entity\Player $players
     */
    public function removePlayer(\COC\COCBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }


  

    /**
     * Get player
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Add imagesBonus
     *
     * @param \COC\COCBundle\Entity\Player $imagesBonus
     * @return Clan
     */
    public function addImagesBonus(\COC\COCBundle\Entity\Player $imagesBonus)
    {
        $this->imagesBonus[] = $imagesBonus;

        return $this;
    }

    /**
     * Remove imagesBonus
     *
     * @param \COC\COCBundle\Entity\Player $imagesBonus
     */
    public function removeImagesBonus(\COC\COCBundle\Entity\Player $imagesBonus)
    {
        $this->imagesBonus->removeElement($imagesBonus);
    }

    /**
     * Get imagesBonus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagesBonus()
    {
        return $this->imagesBonus;
    }



   

    /**
     * Add users
     *
     * @param \Application\Sonata\UserBundle\Entity\User $users
     * @return Clan
     */
    public function addUser(\Application\Sonata\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Application\Sonata\UserBundle\Entity\User $users
     */
    public function removeUser(\Application\Sonata\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add imagebonuses
     *
     * @param \COC\COCBundle\Entity\ImageBonus $imagebonuses
     * @return Clan
     */
    public function addImagebonus(\COC\COCBundle\Entity\ImageBonus $imagebonuses)
    {
        $this->imagebonuses[] = $imagebonuses;

        return $this;
    }

    /**
     * Remove imagebonuses
     *
     * @param \COC\COCBundle\Entity\ImageBonus $imagebonuses
     */
    public function removeImagebonus(\COC\COCBundle\Entity\ImageBonus $imagebonuses)
    {
        $this->imagebonuses->removeElement($imagebonuses);
    }

    /**
     * Get imagebonuses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagebonuses()
    {
        return $this->imagebonuses;
    }

    /**
     * Add imagebestattacks
     *
     * @param \COC\COCBundle\Entity\ImageBestAttack $imagebestattacks
     * @return Clan
     */
    public function addImagebestattack(\COC\COCBundle\Entity\ImageBestAttack $imagebestattacks)
    {
        $this->imagebestattacks[] = $imagebestattacks;

        return $this;
    }

    /**
     * Remove imagebestattacks
     *
     * @param \COC\COCBundle\Entity\ImageBestAttack $imagebestattacks
     */
    public function removeImagebestattack(\COC\COCBundle\Entity\ImageBestAttack $imagebestattacks)
    {
        $this->imagebestattacks->removeElement($imagebestattacks);
    }

    /**
     * Get imagebestattacks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagebestattacks()
    {
        return $this->imagebestattacks;
    }

    /**
     * Add imagebases
     *
     * @param \COC\COCBundle\Entity\ImageBase $imagebases
     * @return Clan
     */
    public function addImagebase(\COC\COCBundle\Entity\ImageBase $imagebases)
    {
        $this->imagebases[] = $imagebases;

        return $this;
    }

    /**
     * Remove imagebases
     *
     * @param \COC\COCBundle\Entity\ImageBase $imagebases
     */
    public function removeImagebase(\COC\COCBundle\Entity\ImageBase $imagebases)
    {
        $this->imagebases->removeElement($imagebases);
    }

    /**
     * Get imagebases
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagebases()
    {
        return $this->imagebases;
    }

    /**
     * Add videos
     *
     * @param \COC\COCBundle\Entity\Video $videos
     * @return Clan
     */
    public function addVideo(\COC\COCBundle\Entity\Video $videos)
    {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \COC\COCBundle\Entity\Video $videos
     */
    public function removeVideo(\COC\COCBundle\Entity\Video $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Add wars
     *
     * @param \COC\COCBundle\Entity\War $wars
     * @return Clan
     */
    public function addWar(\COC\COCBundle\Entity\War $wars)
    {
        $this->wars[] = $wars;

        return $this;
    }

    /**
     * Remove wars
     *
     * @param \COC\COCBundle\Entity\War $wars
     */
    public function removeWar(\COC\COCBundle\Entity\War $wars)
    {
        $this->wars->removeElement($wars);
    }

    /**
     * Get wars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWars()
    {
        return $this->wars;
    }

    public function __toString()
    {
        return (string)$this->name;
    }


    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }



    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Clan
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
     * Set updated
     *
     * @param \DateTime $updated
     * @return Clan
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set nameClan
     *
     * @param string $nameClan
     * @return Clan
     */
    public function setNameClan($nameClan)
    {
        $this->nameClan = $nameClan;

        return $this;
    }

    /**
     * Get nameClan
     *
     * @return string 
     */
    public function getNameClan()
    {
        return $this->nameClan;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Clan
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Clan
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Clan
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}
