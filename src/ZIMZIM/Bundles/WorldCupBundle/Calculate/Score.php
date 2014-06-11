<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;


use Doctrine\ORM\EntityManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;

class Score
{

    private $em;

    private $gamepoint;

    public function __construct(EntityManager $em, GamePoint $gamepoint)
    {
        $this->gamepoint = $gamepoint;
        $this->em = $em;
    }

    public function calcul($games)
    {

        $users = $this->em->getRepository('ZIMZIMBundlesUserBundle:User')->findBy(array('enabled' => true));

        $tabScore = array();

        foreach ($games as $game) {

            $tabScore[$game->getId()] = array();

            foreach ($users as $user) {

                $points = 0;
                $scoreA = 'NR';
                $scoreB = 'NR';

                $userbet = $this->em->getRepository('ZIMZIMBundlesWorldCupBundle:UserBet')->findOneBy(
                    array(
                        'user' => $user,
                        'game' => $game
                    )
                );

                if ($userbet instanceof UserBet) {

                    $this->gamepoint->setGame($game);
                    $this->gamepoint->setUserbet($userbet);
                    $points = $this->gamepoint->calcul();
                    $scoreA = $userbet->getScoreTeamA();
                    $scoreB = $userbet->getScoreTeamB();
                }

                $tabScore[$game->getId()][] = array(
                        'user' => $user->getUsername(),
                        'points' => $points,
                        'score' => $scoreA. ' - ' . $scoreB
                 );
            }
        }

        return $tabScore;

    }

}