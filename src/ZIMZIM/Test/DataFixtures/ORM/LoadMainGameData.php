<?php

namespace ZIMZIM\Bundles\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\MainGame;


class LoadMainGameData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $mainGame = new MainGame();
        $mainGame->setName('FIFA WORLD CUP BRAZIL 2014');
        $mainGame->setDateStart(new \DateTime('2014-06-12'));
        $mainGame->setDateEnd(new \DateTime('2014-07-14'));
        $mainGame->setText('FIFA WORLD CUP BRAZIL 2014 FIFA WORLD CUP BRAZIL 2014');
        $om->persist($mainGame);
        $this->addReference('MAINGAME', $mainGame);

        $om->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}