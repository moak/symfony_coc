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
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
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
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer" ))
     */
    private $capacity;


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer" ))
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="privacy", type="integer" ))
     */
    private $privacy;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer" ))
     */
    private $level;


    /**
     * @var integer
     *
     * @ORM\Column(name="totalTroopReceived", type="integer" , nullable=true)
     */
    private $totalTroopReceived;


    /**
     * @var integer
     *
     * @ORM\Column(name="totalGeneral", type="integer" , nullable=true)
     */
    private $totalGeneral;


    /**
     * @var integer
     *
     * @ORM\Column(name="totalTroopSent", type="integer" , nullable=true)
     */
    private $totalTroopSent;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalTrophy", type="integer" , nullable=true)
     */
    private $totalTrophy;


    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase5", type="integer" , nullable=true)
     */
    private $numberBase5;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase6", type="integer" , nullable=true)
     */
    private $numberBase6;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase7", type="integer" , nullable=true)
     */
    private $numberBase7;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase8", type="integer" ,nullable=true)
     */
    private $numberBase8;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase9", type="integer" , nullable=true)
     */
    private $numberBase9;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberBase10", type="integer" , nullable=true)
     */
    private $numberBase10;


    /**
     * @var integer
     *
     * @ORM\Column(name="numberVideo", type="integer" , nullable=true)
     */
    private $numberVideo;


    /**
     * @var integer
     *
     * @ORM\Column(name="numberBestAttack", type="integer" , nullable=true)
     */
    private $numberBestAttack;


    /**
     * @var integer
     *
     * @ORM\Column(name="numberBonus", type="integer" , nullable=true)
     */
    private $numberBonus;


    /**
     * @var integer
     *
     * @ORM\Column(name="numberPlayer", type="integer" , nullable=true)
     */
    private $numberPlayer;




    /**
     * @var integer
     *
     * @ORM\Column(name="totalAttackWon", type="integer", nullable=true)
     */
    private $totalAttackWon;





    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Image", inversedBy="clans", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $image;



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
    private $country;

    /**
     * @ORM\OneToOne(targetEntity="COC\COCBundle\Entity\Image",cascade={"persist"}))
     * @ORM\JoinColumn(name="image_picture", referencedColumnName="id", nullable=true)
     **/
    private $picture;



    /**
     * @var integer
     *
     * @ORM\Column(name="hiring", type="integer", nullable=true ))
     */
    private $hiring;


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


    private $total;


    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }


    private $nbMember;


    public function getNbMember()
    {
        return $this->nbMember;
    }

    public function setNbMember($nbMember)
    {
        $this->nbMember = $nbMember;

        return $this;
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
     * Get id
     *
     * @return integer
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;

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

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Clan
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

    /**
     * Set level
     *
     * @param integer $level
     * @return Clan
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set image
     *
     * @param \COC\COCBundle\Entity\Image $image
     * @return Clan
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
     * Set country
     *
     * @param string $country
     * @return Clan
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set hiring
     *
     * @param integer $hiring
     * @return Clan
     */
    public function setHiring($hiring)
    {
        $this->hiring = $hiring;

        return $this;
    }

    /**
     * Get hiring
     *
     * @return integer 
     */
    public function getHiring()
    {
        return $this->hiring;
    }

    /**
     * Set picture
     *
     * @param \COC\COCBundle\Entity\Image $picture
     * @return Clan
     */
    public function setPicture(\COC\COCBundle\Entity\Image $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \COC\COCBundle\Entity\Image 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set totalTroopReceived
     *
     * @param integer $totalTroopReceived
     * @return Clan
     */
    public function setTotalTroopReceived($totalTroopReceived)
    {
        $this->totalTroopReceived = $totalTroopReceived;

        return $this;
    }

    /**
     * Get totalTroopReceived
     *
     * @return integer 
     */
    public function getTotalTroopReceived()
    {
        return $this->totalTroopReceived;
    }

    /**
     * Set totalTroopSent
     *
     * @param integer $totalTroopSent
     * @return Clan
     */
    public function setTotalTroopSent($totalTroopSent)
    {
        $this->totalTroopSent = $totalTroopSent;

        return $this;
    }

    /**
     * Get totalTroopSent
     *
     * @return integer 
     */
    public function getTotalTroopSent()
    {
        return $this->totalTroopSent;
    }

    /**
     * Set totalAttackWon
     *
     * @param integer $totalAttackWon
     * @return Clan
     */
    public function setTotalAttackWon($totalAttackWon)
    {
        $this->totalAttackWon = $totalAttackWon;

        return $this;
    }

    /**
     * Get totalAttackWon
     *
     * @return integer 
     */
    public function getTotalAttackWon()
    {
        return $this->totalAttackWon;
    }

    /**
     * Set totalGeneral
     *
     * @param integer $totalGeneral
     * @return Clan
     */
    public function setTotalGeneral($totalGeneral)
    {
        $this->totalGeneral = $totalGeneral;

        return $this;
    }

    /**
     * Get totalGeneral
     *
     * @return integer 
     */
    public function getTotalGeneral()
    {
        return $this->totalGeneral;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return Clan
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set totalTrophy
     *
     * @param integer $totalTrophy
     * @return Clan
     */
    public function setTotalTrophy($totalTrophy)
    {
        $this->totalTrophy = $totalTrophy;

        return $this;
    }

    /**
     * Get totalTrophy
     *
     * @return integer 
     */
    public function getTotalTrophy()
    {
        return $this->totalTrophy;
    }



    /**
     * Set numberVideo
     *
     * @param integer $numberVideo
     * @return Clan
     */
    public function setNumberVideo($numberVideo)
    {
        $this->numberVideo = $numberVideo;

        return $this;
    }

    /**
     * Get numberVideo
     *
     * @return integer 
     */
    public function getNumberVideo()
    {
        return $this->numberVideo;
    }

    /**
     * Set numberBestAttack
     *
     * @param integer $numberBestAttack
     * @return Clan
     */
    public function setNumberBestAttack($numberBestAttack)
    {
        $this->numberBestAttack = $numberBestAttack;

        return $this;
    }

    /**
     * Get numberBestAttack
     *
     * @return integer 
     */
    public function getNumberBestAttack()
    {
        return $this->numberBestAttack;
    }

    /**
     * Set numberBonus
     *
     * @param integer $numberBonus
     * @return Clan
     */
    public function setNumberBonus($numberBonus)
    {
        $this->numberBonus = $numberBonus;

        return $this;
    }

    /**
     * Get numberBonus
     *
     * @return integer 
     */
    public function getNumberBonus()
    {
        return $this->numberBonus;
    }

    /**
     * Set numberPlayer
     *
     * @param integer $numberPlayer
     * @return Clan
     */
    public function setNumberPlayer($numberPlayer)
    {
        $this->numberPlayer = $numberPlayer;

        return $this;
    }

    /**
     * Get numberPlayer
     *
     * @return integer 
     */
    public function getNumberPlayer()
    {
        return $this->numberPlayer;
    }

    /**
     * Set numberBase5
     *
     * @param integer $numberBase5
     * @return Clan
     */
    public function setNumberBase5($numberBase5)
    {
        $this->numberBase5 = $numberBase5;

        return $this;
    }

    /**
     * Get numberBase5
     *
     * @return integer 
     */
    public function getNumberBase5()
    {
        return $this->numberBase5;
    }

    /**
     * Set numberBase6
     *
     * @param integer $numberBase6
     * @return Clan
     */
    public function setNumberBase6($numberBase6)
    {
        $this->numberBase6 = $numberBase6;

        return $this;
    }

    /**
     * Get numberBase6
     *
     * @return integer 
     */
    public function getNumberBase6()
    {
        return $this->numberBase6;
    }

    /**
     * Set numberBase7
     *
     * @param integer $numberBase7
     * @return Clan
     */
    public function setNumberBase7($numberBase7)
    {
        $this->numberBase7 = $numberBase7;

        return $this;
    }

    /**
     * Get numberBase7
     *
     * @return integer 
     */
    public function getNumberBase7()
    {
        return $this->numberBase7;
    }

    /**
     * Set numberBase8
     *
     * @param integer $numberBase8
     * @return Clan
     */
    public function setNumberBase8($numberBase8)
    {
        $this->numberBase8 = $numberBase8;

        return $this;
    }

    /**
     * Get numberBase8
     *
     * @return integer 
     */
    public function getNumberBase8()
    {
        return $this->numberBase8;
    }

    /**
     * Set numberBase9
     *
     * @param integer $numberBase9
     * @return Clan
     */
    public function setNumberBase9($numberBase9)
    {
        $this->numberBase9 = $numberBase9;

        return $this;
    }

    /**
     * Get numberBase9
     *
     * @return integer 
     */
    public function getNumberBase9()
    {
        return $this->numberBase9;
    }

    /**
     * Set numberBase10
     *
     * @param integer $numberBase10
     * @return Clan
     */
    public function setNumberBase10($numberBase10)
    {
        $this->numberBase10 = $numberBase10;

        return $this;
    }

    /**
     * Get numberBase10
     *
     * @return integer 
     */
    public function getNumberBase10()
    {
        return $this->numberBase10;
    }
}
