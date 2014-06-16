<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ClientGameEvent extends Event
{
    private $clientGame;

    /**
     * @param mixed $clientGame
     */
    public function setClientGame($clientGame)
    {
        $this->clientGame = $clientGame;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientGame()
    {
        return $this->clientGame;
    }



}