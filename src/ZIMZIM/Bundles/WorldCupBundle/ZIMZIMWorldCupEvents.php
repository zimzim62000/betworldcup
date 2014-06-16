<?php

namespace ZIMZIM\Bundles\WorldCupBundle;

final class ZIMZIMWorldCupEvents{

    /**
     * update ZIMZIM\Bundles\WorldCupBundle\Entity\Score
     * when update score team on ZIMZIM\Bundles\WorldCupBundle\Entity\Game
     */
    const UPDATE_SCORE = 'zimzim_worldcup.score.update';


    /**
     * create ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame
     * when user register on mainGame on ZIMZIM\Bundles\WorldCupBundle\Entity\MainGame
     */
    const REGISTER_CLIENTGAME = 'zimzim_worldcup.clientgame.register';

}