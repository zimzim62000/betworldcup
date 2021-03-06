<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Game
 *
 * @ORM\Table(name="worldcup_game")
 * @ORM\Entity(repositoryClass="GameRepository")
 *
 *
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(visible=false, sortable=false, filterable=false, title="grid.columns.game.id")
     */
    private $id;

    /**
     * @var integer
     *
     * @GRID\Column(field="teamA.name", title="grid.columns.game.team",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Team", inversedBy="gamesD")
     * @ORM\JoinColumn(name="id_team_a", referencedColumnName="id", nullable=false)
     */
    private $teamA;

    /**
     * @var integer
     *
     * @GRID\Column(field="teamB.name", title="grid.columns.game.team", operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Team", inversedBy="gamesE")
     * @ORM\JoinColumn(name="id_team_b", referencedColumnName="id", nullable=false)
     */
    private $teamB;

    /**
     * @var integer
     *
     * @GRID\Column(operatorsVisible=false, filterable=false, role="ROLE_ADMIN", title="grid.columns.game.score")
     *
     * @ORM\Column(name="scoreTeamA", type="integer", nullable=true)
     */
    private $scoreTeamA;

    /**
     * @var integer
     * @GRID\Column(operatorsVisible=false, filterable=false, role="ROLE_ADMIN", title="grid.columns.game.score")
     *
     * @ORM\Column(name="scoreTeamB", type="integer", nullable=true)
     */
    private $scoreTeamB;

    /**
     * @var \DateTime
     *
     * @GRID\Column(format="d/m - H:i", operatorsVisible=false, title="grid.columns.game.date")
     *
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @GRID\Column(operatorsVisible=false, role="ROLE_ADMIN", title="grid.columns.game.type")
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet", mappedBy="game")
     */
    private $gameBets;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Score", mappedBy="game")
     */
    private $scores;


    public function __construct(){
        $this->gameBets = new ArrayCollection();
        $this->scores = new ArrayCollection();
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
     * Set teamA
     *
     * @param integer $teamA
     * @return Game
     */
    public function setTeamA($teamA)
    {
        $this->teamA = $teamA;

        return $this;
    }

    /**
     * Get teamA
     *
     * @return integer 
     */
    public function getTeamA()
    {
        return $this->teamA;
    }

    /**
     * Set teamB
     *
     * @param integer $teamB
     * @return Game
     */
    public function setTeamB($teamB)
    {
        $this->teamB = $teamB;

        return $this;
    }

    /**
     * Get teamB
     *
     * @return integer 
     */
    public function getTeamB()
    {
        return $this->teamB;
    }

    /**
     * Set scoreTeamA
     *
     * @param integer $scoreTeamA
     * @return Game
     */
    public function setScoreTeamA($scoreTeamA)
    {
        $this->scoreTeamA = $scoreTeamA;

        return $this;
    }

    /**
     * Get scoreTeamA
     *
     * @return integer 
     */
    public function getScoreTeamA()
    {
        return $this->scoreTeamA;
    }

    /**
     * Set scoreTeamB
     *
     * @param integer $scoreTeamB
     * @return Game
     */
    public function setScoreTeamB($scoreTeamB)
    {
        $this->scoreTeamB = $scoreTeamB;

        return $this;
    }

    /**
     * Get scoreTeamB
     *
     * @return integer 
     */
    public function getScoreTeamB()
    {
        return $this->scoreTeamB;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Game
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString(){
        return $this->getType().' :'.$this->teamA->getName().' VS '.$this->teamB->getName();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $gameBets
     */
    public function setGameBets($gameBets)
    {
        $this->gameBets = $gameBets;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGameBets()
    {
        return $this->gameBets;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $scores
     */
    public function setScores($scores)
    {
        $this->scores = $scores;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getScores()
    {
        return $this->scores;
    }



}
