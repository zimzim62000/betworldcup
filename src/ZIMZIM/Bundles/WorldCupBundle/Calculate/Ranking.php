<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Calculate;

use Doctrine\ORM\EntityManager;

class Ranking
{

    private $em;
    private $userRanking;

    public function __construct(EntityManager $em, UserRanking $userRanking)
    {
        $this->em = $em;
        $this->userRanking = $userRanking;
    }

    public function calcul()
    {

        $tabRanking = array();

        $users = $this->em->getRepository('ZIMZIMBundlesUserBundle:User')->findBy(array('enabled' => 1));

        foreach ($users as $user) {

            $scores = $this->em->getRepository('ZIMZIMBundlesWorldCupBundle:Score')->findBy(array('user' => $user));

            $scoreUser = 0;
            $maxScoreUser = 0;
            foreach ($scores as $score) {

                $scoreUser += $score->getScore();
                if ($score->getScore() === GamePoint::MAX_POINT) {
                    $maxScoreUser++;
                }
            }
            $UserRanking = clone $this->userRanking;
            $UserRanking->setUser($user->getUsername());
            $UserRanking->setScore($scoreUser);
            $UserRanking->setNbMaxScore($maxScoreUser);
            $tabRanking[] = $UserRanking;
        }

        usort(
            $tabRanking,
            function($a, $b) {
                if($a->getScore() === $b->getScore()){
                    return $a->getNbMaxScore() <= $b->getNbMaxScore();
                }
                return $a->getScore() <= $b->getScore();
            }
        );

        return $tabRanking;
    }


}