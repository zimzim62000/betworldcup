<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ScoreEvent extends Event
{
    private $game;

    /**
     * @param mixed $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

}