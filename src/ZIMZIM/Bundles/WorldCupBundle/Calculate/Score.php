<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;


use Doctrine\ORM\EntityManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;
use \ZIMZIM\Bundles\WorldCupBundle\Entity\Score as ScoreEntity;

class Score
{

    private $em;
    private $gamepoint;
    private $score;

    public function __construct(EntityManager $em, GamePoint $gamepoint, ScoreEntity $score)
    {
        $this->gamepoint = $gamepoint;
        $this->em = $em;
        $this->score = $score;
    }

    public function calcul($game)
    {

        $users = $this->em->getRepository('ZIMZIMBundlesUserBundle:User')->findBy(array('enabled' => true));

        foreach ($users as $user) {

            $userbet = $this->em->getRepository('ZIMZIMBundlesWorldCupBundle:UserBet')->findOneBy(
                array(
                    'user' => $user,
                    'game' => $game
                )
            );

            if ($userbet instanceof UserBet) {

                $score = $this->em->getRepository('ZIMZIMBundlesWorldCupBundle:Score')->findOneBy(
                    array(
                        'user' => $user,
                        'game' => $game
                    )
                );

                if (!$score instanceof ScoreEntity) {
                    $score = clone $this->score;
                    $score->setGame($game);
                    $score->setUser($user);
                }

                $gamePoint = clone $this->gamepoint;
                $gamePoint->setGame($game);
                $gamePoint->setUserbet($userbet);
                $score->setScore($gamePoint->calcul());
                $score->setUserbet($userbet);
                $this->em->persist($score);
            }
        }
        $this->em->flush();

        return true;
    }


}