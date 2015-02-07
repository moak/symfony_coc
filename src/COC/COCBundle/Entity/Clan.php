<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Clan
 *
 * @ORM\Table(name="clan")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ClanRepository")
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
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\Player", mappedBy="player")
     **/
    private $players ;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\War", mappedBy="war")
     **/
    private $wars ;

    /**
     * @ORM\OneToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", mappedBy="user")
     **/
    private $users ;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBonus", mappedBy="imagebonus")
     **/
    private $imagebonuses;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBestAttack", mappedBy="imagebestattack")
     **/
    private $imagebestattacks;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\Video", mappedBy="video")
     **/
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBase", mappedBy="imagebase")
     **/
    private $imagebases;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;


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
        return $this->name;
    }

}
