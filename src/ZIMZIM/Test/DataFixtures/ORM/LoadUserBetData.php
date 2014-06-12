<?php

namespace ZIMZIM\Bundles\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;


class LoadUserBetData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $userbet = new UserBet();
        $userbet->setUser($this->getReference('zimzim'));
        $userbet->setGame($this->getReference('match1'));
        $userbet->setScoreTeamA(3);
        $userbet->setScoreTeamB(0);
        $om->persist($userbet);

        $userbet = new UserBet();
        $userbet->setUser($this->getReference('zimzim'));
        $userbet->setGame($this->getReference('match2'));
        $userbet->setScoreTeamA(3);
        $userbet->setScoreTeamB(1);
        $om->persist($userbet);


        $userbet = new UserBet();
        $userbet->setUser($this->getReference('valentin'));
        $userbet->setGame($this->getReference('match1'));
        $userbet->setScoreTeamA(2);
        $userbet->setScoreTeamB(1);
        $om->persist($userbet);

        $userbet = new UserBet();
        $userbet->setUser($this->getReference('valentin'));
        $userbet->setGame($this->getReference('match2'));
        $userbet->setScoreTeamA(1);
        $userbet->setScoreTeamB(1);
        $om->persist($userbet);

        $om->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}