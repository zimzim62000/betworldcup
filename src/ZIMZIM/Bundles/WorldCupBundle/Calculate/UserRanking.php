<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;

class UserRanking{


    private $user;

    private $score;

    private $nbMaxScore;

    /**
     * @param mixed $nbMaxScore
     */
    public function setNbMaxScore($nbMaxScore)
    {
        $this->nbMaxScore = $nbMaxScore;
    }

    /**
     * @return mixed
     */
    public function getNbMaxScore()
    {
        return $this->nbMaxScore;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}