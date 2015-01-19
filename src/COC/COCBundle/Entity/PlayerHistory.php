<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 *
 * @ORM\Table(name="playerhistory")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\PlayerHistoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PlayerHistory
{

    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Player", inversedBy="playerhistories")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="COC\COCBundle\Entity\Season", inversedBy="playerHistory")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id", nullable=true)
     */
    private $season;


    /**
     * Set hall_town
     *
     * @param player $player
     * @return Player
     */
    public function setPlayer($player)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get hall_town
     *
     * @return  player
     */
    public function getPlayer()
    {
        return $this->player;
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
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        // Add your code here
    }

    /**
     * Set season
     *
     * @param \COC\COCBundle\Entity\Season $season
     * @return PlayerHistory
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
}
