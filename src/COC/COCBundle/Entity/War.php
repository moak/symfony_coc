<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarAdmin
 *
 * @ORM\Table(name="war")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\WarRepository")
 */
class War
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
     * @var integer
     *
     * @ORM\Column(name="result", type="integer")
     */
    private $result;

    /**
     * @var string
     *
     * @ORM\Column(name="opponent", type="string", nullable=true)
     */
    private $opponent;

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
     * Set start
     *
     * @param \DateTime $start
     * @return War
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
     * @return War
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

    /**
     * Set status
     *
     * @param integer $status
     * @return War
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set result
     *
     * @param integer $result
     * @return War
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer 
     */
    public function getResult()
    {
        return $this->result;
    }

    function __construct() {
        $this->result = 0;
    }




    /**
     * Set opponent
     *
     * @param string $opponent
     * @return War
     */
    public function setOpponent($opponent)
    {
        $this->opponent = $opponent;

        return $this;
    }

    /**
     * Get opponent
     *
     * @return string 
     */
    public function getOpponent()
    {
        return $this->opponent;
    }
}
