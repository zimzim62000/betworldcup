<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;


use Doctrine\ORM\EntityManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;

class Score{

    private $em;

    private $gamepoint;

    public function __construct(EntityManager $em, GamePoint $gamepoint){
        $this->gamepoint = $gamepoint;
        $this->em = $em;
    }

    public function calcul($games){

        $users = $this->em->getRepository('ZIMZIMBundlesUserBundle:User')->findAll();

        $tabScore = array();

        foreach($games as $game){

            $tabScore[$game->getId()] = array();

            foreach($users as $user){

                $points = 0;

                $userbet = $this->em->getRepository('ZIMZIMBundlesWorldCupBundle:UserBet')->findOneBy(
                    array(
                        'user'  => $user,
                        'game' => $game
                    )
                );

                if($userbet instanceof UserBet){

                    $this->gamepoint->setGame($game);
                    $this->gamepoint->setUserbet($userbet);
                    $points = $this->gamepoint->calcul();
                }

                $tabScore[$game->getId()][] = array(
                    'user' => $user->getUsername(),
                    'points' => $points,
                    'score' => $userbet->getScoreTeamA(). ' - '. $userbet->getScoreTeamB()
                 );
            }
        }

        return $tabScore;

    }

}