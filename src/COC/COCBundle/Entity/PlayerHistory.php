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
class PlayerHistory extends Player
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



}
