<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\UserInfoRepository")
 */
class UserInfo
{
    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="userInfos")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Season", inversedBy="userInfos")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;



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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hall_town", type="integer")
     */
    private $hallTown;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_received", type="integer")
     */
    private $troopReceived;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_sent", type="integer")
     */
    private $troopSent;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack_won", type="integer")
     */
    private $attackWon;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="trophy", type="integer")
     */
    private $trophy;



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
     * Set hallTown
     *
     * @param integer $hallTown
     * @return UserInfo
     */
    public function setHallTown($hallTown)
    {
        $this->hallTown = $hallTown;

        return $this;
    }

    /**
     * Get hallTown
     *
     * @return integer 
     */
    public function getHallTown()
    {
        return $this->hallTown;
    }

    /**
     * Set troopReceived
     *
     * @param integer $troopReceived
     * @return UserInfo
     */
    public function setTroopReceived($troopReceived)
    {
        $this->troopReceived = $troopReceived;

        return $this;
    }

    /**
     * Get troopReceived
     *
     * @return integer 
     */
    public function getTroopReceived()
    {
        return $this->troopReceived;
    }

    /**
     * Set troopSent
     *
     * @param integer $troopSent
     * @return UserInfo
     */
    public function setTroopSent($troopSent)
    {
        $this->troopSent = $troopSent;

        return $this;
    }

    /**
     * Get troopSent
     *
     * @return integer 
     */
    public function getTroopSent()
    {
        return $this->troopSent;
    }

    /**
     * Set attackWon
     *
     * @param integer $attackWon
     * @return UserInfo
     */
    public function setAttackWon($attackWon)
    {
        $this->attackWon = $attackWon;

        return $this;
    }

    /**
     * Get attackWon
     *
     * @return integer 
     */
    public function getAttackWon()
    {
        return $this->attackWon;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return UserInfo
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
     * Set trophy
     *
     * @param integer $trophy
     * @return UserInfo
     */
    public function setTrophy($trophy)
    {
        $this->trophy = $trophy;

        return $this;
    }

    /**
     * Get trophy
     *
     * @return integer 
     */
    public function getTrophy()
    {
        return $this->trophy;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     * @return UserInfo
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
     * Set season
     *
     * @param \COC\COCBundle\Entity\Season $season
     * @return UserInfo
     */
    public function setSeason(\COC\COCBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return \COC\COCBundle\Entity\Season 
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return UserInfo
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
}
