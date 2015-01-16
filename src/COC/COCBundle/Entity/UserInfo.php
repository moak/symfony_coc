<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 *
 * @ORM\Table(name="userinfo")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\UserInfoRepository")
 */
class UserInfo
{
    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Player", inversedBy="userInfos")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id", nullable=true)
     */
    protected $player;

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
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return UserInfo
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
     * Set player
     *
     * @param \COC\COCBundle\Entity\Player $player
     * @return UserInfo
     */
    public function setPlayer(\COC\COCBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \COC\COCBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
