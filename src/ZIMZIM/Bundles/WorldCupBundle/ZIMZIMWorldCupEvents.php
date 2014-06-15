<?php

namespace ZIMZIM\Bundles\WorldCupBundle;

final class ZIMZIMWorldCupEvents{

    /**
     * update ZIMZIM\Bundles\WorldCupBundle\Entity\Score
     * when update score team on ZIMZIM\Bundles\WorldCupBundle\Entity\Game
     */
    const UPDATE_SCORE = 'zimzim_worldcup.score.update';
}