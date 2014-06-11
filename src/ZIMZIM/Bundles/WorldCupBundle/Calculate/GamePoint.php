<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;

use ZIMZIM\Bundles\WorldCupBundle\Entity\Game;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;

class GamePoint
{

    const MAX_POINT = 3;
    const POINT = 1;

    /**
     * @var ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet
     */
    private $userbet;

    /**
     * @var ZIMZIM\Bundles\WorldCupBundle\Entity\Game
     */
    private $game;

    /**
     * @param \ZIMZIM\Bundles\WorldCupBundle\Calculate\ZIMZIM\Bundles\WorldCupBundle\Entity\Game $game
     */
    public function setGame(Game $game)
    {
        $this->game = $game;
    }

    /**
     * @return \ZIMZIM\Bundles\WorldCupBundle\Calculate\ZIMZIM\Bundles\WorldCupBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param \ZIMZIM\Bundles\WorldCupBundle\Calculate\ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet $userbet
     */
    public function setUserbet(UserBet $userbet)
    {
        $this->userbet = $userbet;
    }

    /**
     * @return \ZIMZIM\Bundles\WorldCupBundle\Calculate\ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet
     */
    public function getUserbet()
    {
        return $this->userbet;
    }

    public function calcul()
    {


        /**
         * userbet === game
         */
        if ($this->getUserbet()->getScoreTeamA() === $this->game->getScoreTeamA() &&
            $this->getUserbet()->getScoreTeamB() === $this->game->getScoreTeamB()
        ) {
            return self::MAX_POINT;
        }

        /**
         * match null
         */
        if($this->game->getScoreTeamA() === $this->game->getScoreTeamB()){
            if($this->getUserbet()->getScoreTeamA() === $this->getUserbet()->getScoreTeamB()){
                return self::POINT;
            }
        }

        /**
         * victoire equipe A
         */
        if($this->game->getScoreTeamA() > $this->game->getScoreTeamB()){
            if($this->getUserbet()->getScoreTeamA() > $this->getUserbet()->getScoreTeamB()){
                return self::POINT;
            }
        }


        /**
         * victoire equipe B
         */
        if($this->game->getScoreTeamA() < $this->game->getScoreTeamB()){
            if($this->getUserbet()->getScoreTeamA() < $this->getUserbet()->getScoreTeamB()){
                return self::POINT;
            }
        }


        return 0;
    }

}