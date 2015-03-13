<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\SeasonRepository")
 */
class Season //implements JsonSerializable
{
   /* public function jsonSerialize()
    {
        return array(
            'name' => $this->name
        );
    }
*/
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\PlayerHistory", mappedBy="season")
     **/
    private $playerHistory ;

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
     * @return Season
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
     * Set start
     *
     * @param \DateTime $start
     * @return Season
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Season
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->playerHistory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add playerHistory
     *
     * @param \COC\COCBundle\Entity\PlayerHistory $playerHistory
     * @return Season
     */
    public function addPlayerHistory(\COC\COCBundle\Entity\PlayerHistory $playerHistory)
    {
        $this->playerHistory[] = $playerHistory;

        return $this;
    }

    /**
     * Remove playerHistory
     *
     * @param \COC\COCBundle\Entity\PlayerHistory $playerHistory
     */
    public function removePlayerHistory(\COC\COCBundle\Entity\PlayerHistory $playerHistory)
    {
        $this->playerHistory->removeElement($playerHistory);
    }

    /**
     * Get playerHistory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayerHistory()
    {
        return $this->playerHistory;
    }
}
