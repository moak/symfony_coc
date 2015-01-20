<?php

namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\PlayerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Player
{

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


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
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="hall_town", type="integer", nullable=true)
     */
    private $hallTown  ;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_received", type="integer", nullable=true)
     */
    private $troopReceived;

    /**
     * @var integer
     *
     * @ORM\Column(name="troop_sent", type="integer", nullable=true)
     */
    private $troopSent;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack_won", type="integer", nullable=true)
     */
    private $attackWon;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="trophy", type="integer", nullable=true)
     */
    private $trophy;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon1", type="integer", nullable=true)
     */
    private $canon1;

    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence1", type="integer", nullable=true)
     */
    private $air_defence1;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence2", type="integer", nullable=true)
     */
    private $air_defence2;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence3", type="integer", nullable=true)
     */
    private $air_defence3;


    /**
     * @var integer
     *
     * @ORM\Column(name="air_defence4", type="integer", nullable=true)
     */
    private $air_defence4;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon2", type="integer", nullable=true)
     */
    private $canon2;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon3", type="integer", nullable=true)
     */
    private $canon3;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon4", type="integer", nullable=true)
     */
    private $canon4;

    /**
     * @var integer
     *
     * @ORM\Column(name="canon5", type="integer", nullable=true)
     */
    private $canon5;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon6", type="integer", nullable=true)
     */
    private $canon6;


    /**
     * @var integer
     *
     * @ORM\Column(name="canon7", type="integer", nullable=true)
     */
    private $canon7;



    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer1", type="integer", nullable=true)
     */
    private $tower_archer1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer2", type="integer", nullable=true)
     */
    private $tower_archer2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer3", type="integer", nullable=true)
     */
    private $tower_archer3;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer4", type="integer", nullable=true)
     */
    private $tower_archer4;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer5", type="integer", nullable=true)
     */
    private $tower_archer5;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer6", type="integer", nullable=true)
     */
    private $tower_archer6;

    /**
     * @var integer
     *
     * @ORM\Column(name="tower_archer7", type="integer", nullable=true)
     */
    private $tower_archer7;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic1", type="integer", nullable=true)
     */
    private $tower_magic1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic2", type="integer", nullable=true)
     */
    private $tower_magic2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic3", type="integer", nullable=true)
     */
    private $tower_magic3;


    /**
     * @var integer
     *
     * @ORM\Column(name="tower_magic4", type="integer", nullable=true)
     */
    private $tower_magic4;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar1", type="integer", nullable=true)
     */
    private $mortar1;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar2", type="integer", nullable=true)
     */
    private $mortar2;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar3", type="integer", nullable=true)
     */
    private $mortar3;


    /**
     * @var integer
     *
     * @ORM\Column(name="mortar4", type="integer", nullable=true)
     */
    private $mortar4;

    /**
     * @var integer
     *
     * @ORM\Column(name="tesla1", type="integer", nullable=true)
     */
    private $tesla1;


    /**
     * @var integer
     *
     * @ORM\Column(name="tesla2", type="integer", nullable=true)
     */
    private $tesla2;


    /**
     * @var integer
     *
     * @ORM\Column(name="tesla3", type="integer", nullable=true)
     */
    private $tesla3;

    /**
     * @var integer
     *
     * @ORM\Column(name="inferno1", type="integer", nullable=true)
     */
    private $inferno1;


    /**
     * @var integer
     *
     * @ORM\Column(name="inferno2", type="integer", nullable=true)
     */
    private $inferno2;
    

    /**
     * @var integer
     *
     * @ORM\Column(name="king", type="integer", nullable=true)
     */
    private $king;


    /**
     * @var integer
     *
     * @ORM\Column(name="queen", type="integer", nullable=true)
     */
    private $queen;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx1", type="integer", nullable=true)
     */
    private $arcx1;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx2", type="integer", nullable=true)
     */
    private $arcx2;


    /**
     * @var integer
     *
     * @ORM\Column(name="arcx3", type="integer", nullable=true)
     */
    private $arcx3;



    /**
     * @var integer
     *
     * @ORM\Column(name="archer", type="integer", nullable=true)
     */
    private $archer;


    /**
     * @var integer
     *
     * @ORM\Column(name="barbar", type="integer", nullable=true)
     */
    private $barbar;


    /**
     * @var integer
     *
     * @ORM\Column(name="gobelin", type="integer", nullable=true)
     */
    private $gobelin;

    /**
     * @var integer
     *
     * @ORM\Column(name="geant", type="integer", nullable=true)
     */
    private $geant;

    /**
     * @var integer
     *
     * @ORM\Column(name="wall_breaker", type="integer", nullable=true)
     */
    private $wall_breaker;


    /**
     * @var integer
     *
     * @ORM\Column(name="ballon", type="integer", nullable=true)
     */
    private $ballon;


    /**
     * @var integer
     *
     * @ORM\Column(name="wizard", type="integer", nullable=true)
     */
    private $wizard;


    /**
     * @var integer
     *
     * @ORM\Column(name="healer", type="integer", nullable=true)
     */
    private $healer;


    /**
     * @var integer
     *
     * @ORM\Column(name="dragon", type="integer", nullable=true)
     */
    private $dragon;


    /**
     * @var integer
     *
     * @ORM\Column(name="pekka", type="integer", nullable=true)
     */
    private $pekka;

    /**
     * @var integer
     *
     * @ORM\Column(name="minion", type="integer", nullable=true)
     */
    private $minion;

    /**
     * @var integer
     *
     * @ORM\Column(name="rider", type="integer", nullable=true)
     */
    private $rider;


    /**
     * @var integer
     *
     * @ORM\Column(name="valkyrie", type="integer", nullable=true)
     */
    private $valkyrie;


    /**
     * @var integer
     *
     * @ORM\Column(name="golem", type="integer", nullable=true)
     */
    private $golem;


    /**
     * @var integer
     *
     * @ORM\Column(name="witch", type="integer", nullable=true)
     */
    private $witch;

    /**
     * @var integer
     *
     * @ORM\Column(name="lava", type="integer", nullable=true)
     */
    private $lava;



    /**
     * @var integer
     *
     * @ORM\Column(name="potion_heal", type="integer", nullable=true)
     */
    private $potion_heal;


    /**
     * @var integer
     *
     * @ORM\Column(name="potion_boost", type="integer", nullable=true)
     */
    private $potion_boost;



    /**
     * @var integer
     *
     * @ORM\Column(name="potion_damage", type="integer", nullable=true)
     */
    private $potion_damage;


    /**
     * @var integer
     *
     * @ORM\Column(name="potion_green", type="integer", nullable=true)
     */
    private $potion_green;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\PlayerHistory", mappedBy="player")
     **/
    private $playerhistories ;



    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="player",cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

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

    /**
     * Set canon1
     *
     * @param integer $canon1
     * @return Player
     */
    public function setCanon1($canon1)
    {
        $this->canon1 = $canon1;

        return $this;
    }

    /**
     * Get canon1
     *
     * @return integer 
     */
    public function getCanon1()
    {
        return $this->canon1;
    }

    /**
     * Set canon2
     *
     * @param integer $canon2
     * @return Player
     */
    public function setCanon2($canon2)
    {
        $this->canon2 = $canon2;

        return $this;
    }

    /**
     * Get canon2
     *
     * @return integer 
     */
    public function getCanon2()
    {
        return $this->canon2;
    }

    /**
     * Set canon3
     *
     * @param integer $canon3
     * @return Player
     */
    public function setCanon3($canon3)
    {
        $this->canon3 = $canon3;

        return $this;
    }

    /**
     * Get canon3
     *
     * @return integer 
     */
    public function getCanon3()
    {
        return $this->canon3;
    }

    /**
     * Set canon4
     *
     * @param integer $canon4
     * @return Player
     */
    public function setCanon4($canon4)
    {
        $this->canon4 = $canon4;

        return $this;
    }

    /**
     * Get canon4
     *
     * @return integer 
     */
    public function getCanon4()
    {
        return $this->canon4;
    }

    /**
     * Set canon5
     *
     * @param integer $canon5
     * @return Player
     */
    public function setCanon5($canon5)
    {
        $this->canon5 = $canon5;

        return $this;
    }

    /**
     * Get canon5
     *
     * @return integer 
     */
    public function getCanon5()
    {
        return $this->canon5;
    }

    /**
     * Set canon6
     *
     * @param integer $canon6
     * @return Player
     */
    public function setCanon6($canon6)
    {
        $this->canon6 = $canon6;

        return $this;
    }

    /**
     * Get canon6
     *
     * @return integer 
     */
    public function getCanon6()
    {
        return $this->canon6;
    }

    /**
     * Set tower_archer1
     *
     * @param integer $towerArcher1
     * @return Player
     */
    public function setTowerArcher1($towerArcher1)
    {
        $this->tower_archer1 = $towerArcher1;

        return $this;
    }

    /**
     * Get tower_archer1
     *
     * @return integer 
     */
    public function getTowerArcher1()
    {
        return $this->tower_archer1;
    }

    /**
     * Set tower_archer2
     *
     * @param integer $towerArcher2
     * @return Player
     */
    public function setTowerArcher2($towerArcher2)
    {
        $this->tower_archer2 = $towerArcher2;

        return $this;
    }

    /**
     * Get tower_archer2
     *
     * @return integer 
     */
    public function getTowerArcher2()
    {
        return $this->tower_archer2;
    }

    /**
     * Set tower_archer3
     *
     * @param integer $towerArcher3
     * @return Player
     */
    public function setTowerArcher3($towerArcher3)
    {
        $this->tower_archer3 = $towerArcher3;

        return $this;
    }

    /**
     * Get tower_archer3
     *
     * @return integer 
     */
    public function getTowerArcher3()
    {
        return $this->tower_archer3;
    }

    /**
     * Set tower_archer4
     *
     * @param integer $towerArcher4
     * @return Player
     */
    public function setTowerArcher4($towerArcher4)
    {
        $this->tower_archer4 = $towerArcher4;

        return $this;
    }

    /**
     * Get tower_archer4
     *
     * @return integer 
     */
    public function getTowerArcher4()
    {
        return $this->tower_archer4;
    }

    /**
     * Set tower_archer5
     *
     * @param integer $towerArcher5
     * @return Player
     */
    public function setTowerArcher5($towerArcher5)
    {
        $this->tower_archer5 = $towerArcher5;

        return $this;
    }

    /**
     * Get tower_archer5
     *
     * @return integer 
     */
    public function getTowerArcher5()
    {
        return $this->tower_archer5;
    }

    /**
     * Set tower_archer6
     *
     * @param integer $towerArcher6
     * @return Player
     */
    public function setTowerArcher6($towerArcher6)
    {
        $this->tower_archer6 = $towerArcher6;

        return $this;
    }

    /**
     * Get tower_archer6
     *
     * @return integer 
     */
    public function getTowerArcher6()
    {
        return $this->tower_archer6;
    }

    /**
     * Set tower_magic1
     *
     * @param integer $towerMagic1
     * @return Player
     */
    public function setTowerMagic1($towerMagic1)
    {
        $this->tower_magic1 = $towerMagic1;

        return $this;
    }

    /**
     * Get tower_magic1
     *
     * @return integer 
     */
    public function getTowerMagic1()
    {
        return $this->tower_magic1;
    }

    /**
     * Set tower_magic2
     *
     * @param integer $towerMagic2
     * @return Player
     */
    public function setTowerMagic2($towerMagic2)
    {
        $this->tower_magic2 = $towerMagic2;

        return $this;
    }

    /**
     * Get tower_magic2
     *
     * @return integer 
     */
    public function getTowerMagic2()
    {
        return $this->tower_magic2;
    }

    /**
     * Set tower_magic3
     *
     * @param integer $towerMagic3
     * @return Player
     */
    public function setTowerMagic3($towerMagic3)
    {
        $this->tower_magic3 = $towerMagic3;

        return $this;
    }

    /**
     * Get tower_magic3
     *
     * @return integer 
     */
    public function getTowerMagic3()
    {
        return $this->tower_magic3;
    }

    /**
     * Set tower_magic4
     *
     * @param integer $towerMagic4
     * @return Player
     */
    public function setTowerMagic4($towerMagic4)
    {
        $this->tower_magic4 = $towerMagic4;

        return $this;
    }

    /**
     * Get tower_magic4
     *
     * @return integer 
     */
    public function getTowerMagic4()
    {
        return $this->tower_magic4;
    }

    /**
     * Set mortar1
     *
     * @param integer $mortar1
     * @return Player
     */
    public function setMortar1($mortar1)
    {
        $this->mortar1 = $mortar1;

        return $this;
    }

    /**
     * Get mortar1
     *
     * @return integer 
     */
    public function getMortar1()
    {
        return $this->mortar1;
    }

    /**
     * Set mortar2
     *
     * @param integer $mortar2
     * @return Player
     */
    public function setMortar2($mortar2)
    {
        $this->mortar2 = $mortar2;

        return $this;
    }

    /**
     * Get mortar2
     *
     * @return integer 
     */
    public function getMortar2()
    {
        return $this->mortar2;
    }

    /**
     * Set mortar3
     *
     * @param integer $mortar3
     * @return Player
     */
    public function setMortar3($mortar3)
    {
        $this->mortar3 = $mortar3;

        return $this;
    }

    /**
     * Get mortar3
     *
     * @return integer 
     */
    public function getMortar3()
    {
        return $this->mortar3;
    }

    /**
     * Set mortar4
     *
     * @param integer $mortar4
     * @return Player
     */
    public function setMortar4($mortar4)
    {
        $this->mortar4 = $mortar4;

        return $this;
    }

    /**
     * Get mortar4
     *
     * @return integer 
     */
    public function getMortar4()
    {
        return $this->mortar4;
    }

    /**
     * Set tesla1
     *
     * @param integer $tesla1
     * @return Player
     */
    public function setTesla1($tesla1)
    {
        $this->tesla1 = $tesla1;

        return $this;
    }

    /**
     * Get tesla1
     *
     * @return integer 
     */
    public function getTesla1()
    {
        return $this->tesla1;
    }

    /**
     * Set tesla2
     *
     * @param integer $tesla2
     * @return Player
     */
    public function setTesla2($tesla2)
    {
        $this->tesla2 = $tesla2;

        return $this;
    }

    /**
     * Get tesla2
     *
     * @return integer 
     */
    public function getTesla2()
    {
        return $this->tesla2;
    }

    /**
     * Set tesla3
     *
     * @param integer $tesla3
     * @return Player
     */
    public function setTesla3($tesla3)
    {
        $this->tesla3 = $tesla3;

        return $this;
    }

    /**
     * Get tesla3
     *
     * @return integer 
     */
    public function getTesla3()
    {
        return $this->tesla3;
    }

    /**
     * Set king
     *
     * @param integer $king
     * @return Player
     */
    public function setKing($king)
    {
        $this->king = $king;

        return $this;
    }

    /**
     * Get king
     *
     * @return integer 
     */
    public function getKing()
    {
        return $this->king;
    }

    /**
     * Set queen
     *
     * @param integer $queen
     * @return Player
     */
    public function setQueen($queen)
    {
        $this->queen = $queen;

        return $this;
    }

    /**
     * Get queen
     *
     * @return integer 
     */
    public function getQueen()
    {
        return $this->queen;
    }

    /**
     * Set arcx1
     *
     * @param integer $arcx1
     * @return Player
     */
    public function setArcx1($arcx1)
    {
        $this->arcx1 = $arcx1;

        return $this;
    }

    /**
     * Get arcx1
     *
     * @return integer 
     */
    public function getArcx1()
    {
        return $this->arcx1;
    }

    /**
     * Set arcx2
     *
     * @param integer $arcx2
     * @return Player
     */
    public function setArcx2($arcx2)
    {
        $this->arcx2 = $arcx2;

        return $this;
    }

    /**
     * Get arcx2
     *
     * @return integer 
     */
    public function getArcx2()
    {
        return $this->arcx2;
    }

    /**
     * Set arcx3
     *
     * @param integer $arcx3
     * @return Player
     */
    public function setArcx3($arcx3)
    {
        $this->arcx3 = $arcx3;

        return $this;
    }

    /**
     * Get arcx3
     *
     * @return integer 
     */
    public function getArcx3()
    {
        return $this->arcx3;
    }

    /**
     * Set archer
     *
     * @param integer $archer
     * @return Player
     */
    public function setArcher($archer)
    {
        $this->archer = $archer;

        return $this;
    }

    /**
     * Get archer
     *
     * @return integer 
     */
    public function getArcher()
    {
        return $this->archer;
    }

    /**
     * Set barbar
     *
     * @param integer $barbar
     * @return Player
     */
    public function setBarbar($barbar)
    {
        $this->barbar = $barbar;

        return $this;
    }

    /**
     * Get barbar
     *
     * @return integer 
     */
    public function getBarbar()
    {
        return $this->barbar;
    }

    /**
     * Set gobelin
     *
     * @param integer $gobelin
     * @return Player
     */
    public function setGobelin($gobelin)
    {
        $this->gobelin = $gobelin;

        return $this;
    }

    /**
     * Get gobelin
     *
     * @return integer 
     */
    public function getGobelin()
    {
        return $this->gobelin;
    }

    /**
     * Set geant
     *
     * @param integer $geant
     * @return Player
     */
    public function setGeant($geant)
    {
        $this->geant = $geant;

        return $this;
    }

    /**
     * Get geant
     *
     * @return integer 
     */
    public function getGeant()
    {
        return $this->geant;
    }

    /**
     * Set wall_breaker
     *
     * @param integer $wallBreaker
     * @return Player
     */
    public function setWallBreaker($wallBreaker)
    {
        $this->wall_breaker = $wallBreaker;

        return $this;
    }

    /**
     * Get wall_breaker
     *
     * @return integer 
     */
    public function getWallBreaker()
    {
        return $this->wall_breaker;
    }

    /**
     * Set ballon
     *
     * @param integer $ballon
     * @return Player
     */
    public function setBallon($ballon)
    {
        $this->ballon = $ballon;

        return $this;
    }

    /**
     * Get ballon
     *
     * @return integer 
     */
    public function getBallon()
    {
        return $this->ballon;
    }

    /**
     * Set wizard
     *
     * @param integer $wizard
     * @return Player
     */
    public function setWizard($wizard)
    {
        $this->wizard = $wizard;

        return $this;
    }

    /**
     * Get wizard
     *
     * @return integer 
     */
    public function getWizard()
    {
        return $this->wizard;
    }

    /**
     * Set healer
     *
     * @param integer $healer
     * @return Player
     */
    public function setHealer($healer)
    {
        $this->healer = $healer;

        return $this;
    }

    /**
     * Get healer
     *
     * @return integer 
     */
    public function getHealer()
    {
        return $this->healer;
    }

    /**
     * Set dragon
     *
     * @param integer $dragon
     * @return Player
     */
    public function setDragon($dragon)
    {
        $this->dragon = $dragon;

        return $this;
    }

    /**
     * Get dragon
     *
     * @return integer 
     */
    public function getDragon()
    {
        return $this->dragon;
    }

    /**
     * Set pekka
     *
     * @param integer $pekka
     * @return Player
     */
    public function setPekka($pekka)
    {
        $this->pekka = $pekka;

        return $this;
    }

    /**
     * Get pekka
     *
     * @return integer 
     */
    public function getPekka()
    {
        return $this->pekka;
    }

    /**
     * Set potion_heal
     *
     * @param integer $potionHeal
     * @return Player
     */
    public function setPotionHeal($potionHeal)
    {
        $this->potion_heal = $potionHeal;

        return $this;
    }

    /**
     * Get potion_heal
     *
     * @return integer 
     */
    public function getPotionHeal()
    {
        return $this->potion_heal;
    }

    /**
     * Set potion_boost
     *
     * @param integer $potionBoost
     * @return Player
     */
    public function setPotionBoost($potionBoost)
    {
        $this->potion_boost = $potionBoost;

        return $this;
    }

    /**
     * Get potion_boost
     *
     * @return integer 
     */
    public function getPotionBoost()
    {
        return $this->potion_boost;
    }

    /**
     * Set potion_damage
     *
     * @param integer $potionDamage
     * @return Player
     */
    public function setPotionDamage($potionDamage)
    {
        $this->potion_damage = $potionDamage;

        return $this;
    }

    /**
     * Get potion_damage
     *
     * @return integer 
     */
    public function getPotionDamage()
    {
        return $this->potion_damage;
    }

    /**
     * Set potion_green
     *
     * @param integer $potionGreen
     * @return Player
     */
    public function setPotionGreen($potionGreen)
    {
        $this->potion_green = $potionGreen;

        return $this;
    }

    /**
     * Get potion_green
     *
     * @return integer 
     */
    public function getPotionGreen()
    {
        return $this->potion_green;
    }

    /**
     * Set inferno1
     *
     * @param integer $inferno1
     * @return Player
     */
    public function setInferno1($inferno1)
    {
        $this->inferno1 = $inferno1;

        return $this;
    }

    /**
     * Get inferno1
     *
     * @return integer 
     */
    public function getInferno1()
    {
        return $this->inferno1;
    }

    /**
     * Set inferno2
     *
     * @param integer $inferno2
     * @return Player
     */
    public function setInferno2($inferno2)
    {
        $this->inferno2 = $inferno2;

        return $this;
    }

    /**
     * Get inferno2
     *
     * @return integer 
     */
    public function getInferno2()
    {
        return $this->inferno2;
    }

    /**
     * Set attack
     *
     * @param integer $attack
     * @return Player
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get attack
     *
     * @return integer 
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set defence
     *
     * @param integer $defence
     * @return Player
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * Get defence
     *
     * @return integer 
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Player
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }




    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
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
     * Constructor
     */
    public function __construct()
    {
        $this->playerhistories = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add playerhistories
     *
     * @param \COC\COCBundle\Entity\PlayerHistory $playerhistories
     * @return Player
     */
    public function addPlayerhistory(\COC\COCBundle\Entity\PlayerHistory $playerhistories)
    {
        $this->playerhistories[] = $playerhistories;

        return $this;
    }

    /**
     * Remove playerhistories
     *
     * @param \COC\COCBundle\Entity\PlayerHistory $playerhistories
     */
    public function removePlayerhistory(\COC\COCBundle\Entity\PlayerHistory $playerhistories)
    {
        $this->playerhistories->removeElement($playerhistories);
    }

    /**
     * Get playerhistories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayerhistories()
    {
        return $this->playerhistories;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Player
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

    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * Set air_defence1
     *
     * @param integer $airDefence1
     * @return Player
     */
    public function setAirDefence1($airDefence1)
    {
        $this->air_defence1 = $airDefence1;

        return $this;
    }

    /**
     * Get air_defence1
     *
     * @return integer 
     */
    public function getAirDefence1()
    {
        return $this->air_defence1;
    }

    /**
     * Set air_defence2
     *
     * @param integer $airDefence2
     * @return Player
     */
    public function setAirDefence2($airDefence2)
    {
        $this->air_defence2 = $airDefence2;

        return $this;
    }

    /**
     * Get air_defence2
     *
     * @return integer 
     */
    public function getAirDefence2()
    {
        return $this->air_defence2;
    }

    /**
     * Set air_defence3
     *
     * @param integer $airDefence3
     * @return Player
     */
    public function setAirDefence3($airDefence3)
    {
        $this->air_defence3 = $airDefence3;

        return $this;
    }

    /**
     * Get air_defence3
     *
     * @return integer 
     */
    public function getAirDefence3()
    {
        return $this->air_defence3;
    }

    /**
     * Set air_defence4
     *
     * @param integer $airDefence4
     * @return Player
     */
    public function setAirDefence4($airDefence4)
    {
        $this->air_defence4 = $airDefence4;

        return $this;
    }

    /**
     * Get air_defence4
     *
     * @return integer 
     */
    public function getAirDefence4()
    {
        return $this->air_defence4;
    }

    /**
     * Set minion
     *
     * @param integer $minion
     * @return Player
     */
    public function setMinion($minion)
    {
        $this->minion = $minion;

        return $this;
    }

    /**
     * Get minion
     *
     * @return integer 
     */
    public function getMinion()
    {
        return $this->minion;
    }

    /**
     * Set rider
     *
     * @param integer $rider
     * @return Player
     */
    public function setRider($rider)
    {
        $this->rider = $rider;

        return $this;
    }

    /**
     * Get rider
     *
     * @return integer 
     */
    public function getRider()
    {
        return $this->rider;
    }

    /**
     * Set valkyrie
     *
     * @param integer $valkyrie
     * @return Player
     */
    public function setValkyrie($valkyrie)
    {
        $this->valkyrie = $valkyrie;

        return $this;
    }

    /**
     * Get valkyrie
     *
     * @return integer 
     */
    public function getValkyrie()
    {
        return $this->valkyrie;
    }

    /**
     * Set golem
     *
     * @param integer $golem
     * @return Player
     */
    public function setGolem($golem)
    {
        $this->golem = $golem;

        return $this;
    }

    /**
     * Get golem
     *
     * @return integer 
     */
    public function getGolem()
    {
        return $this->golem;
    }

    /**
     * Set witch
     *
     * @param integer $witch
     * @return Player
     */
    public function setWitch($witch)
    {
        $this->witch = $witch;

        return $this;
    }

    /**
     * Get witch
     *
     * @return integer 
     */
    public function getWitch()
    {
        return $this->witch;
    }

    /**
     * Set lava
     *
     * @param integer $lava
     * @return Player
     */
    public function setLava($lava)
    {
        $this->lava = $lava;

        return $this;
    }

    /**
     * Get lava
     *
     * @return integer 
     */
    public function getLava()
    {
        return $this->lava;
    }

    /**
     * Set tower_archer7
     *
     * @param integer $towerArcher7
     * @return Player
     */
    public function setTowerArcher7($towerArcher7)
    {
        $this->tower_archer7 = $towerArcher7;

        return $this;
    }

    /**
     * Get tower_archer7
     *
     * @return integer 
     */
    public function getTowerArcher7()
    {
        return $this->tower_archer7;
    }

    /**
     * Set canon7
     *
     * @param integer $canon7
     * @return Player
     */
    public function setCanon7($canon7)
    {
        $this->canon7 = $canon7;

        return $this;
    }

    /**
     * Get canon7
     *
     * @return integer 
     */
    public function getCanon7()
    {
        return $this->canon7;
    }
}
