<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * UserBet
 *
 * @ORM\Table(name="worldcup_userbets")
 * @ORM\Entity(repositoryClass="UserBetRepository")
 * @ORM\HasLifecycleCallbacks
 */
class UserBet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(visible=false, sortable=false, filterable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @GRID\Column(field="game.teamA.name", title="Equipe A",operatorsVisible=false, source=true, filter="select")
     * @GRID\Column(field="game.teamB.name", title="Equipe B",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Game", inversedBy="gameBets")
     * @ORM\JoinColumn(name="id_game", referencedColumnName="id", nullable=false)
     */
    private $game;

    /**
     * @var integer
     *
     * @GRID\Column(field="user.username", title="User",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\UserBundle\Entity\user", inversedBy="userBets")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var integer
     *
     * @GRID\Column(title="scoreTeamA",operatorsVisible=false)
     *
     * @ORM\Column(name="scoreTeamA", type="integer")
     */
    private $scoreTeamA;

    /**
     * @var integer
     *
     * @GRID\Column(title="scoreTeamB",operatorsVisible=false)
     *
     * @ORM\Column(name="scoreTeamB", type="integer")
     */
    private $scoreTeamB;

    /**
     * @var \DateTime
     *
     * @GRID\Column(title="date",operatorsVisible=false)
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set game
     *
     * @param integer $game
     * @return UserBet
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return integer 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return UserBet
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set scoreTeamA
     *
     * @param integer $scoreTeamA
     * @return UserBet
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
     * @return UserBet
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
     * @return UserBet
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

    /** @ORM\PrePersist */
    public function doStuffOnPrePersist()
    {
        $this->date = new \DateTime(date('Y-m-d H:m:s'));
    }

}
