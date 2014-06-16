<?php

namespace ZIMZIM\Bundles\UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ZIMZIM\Bundles\WorldCupBundle\Entity\Game;


class LoadGameData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('FRANCE'));
        $game->setTeamB($this->getReference('CROATIE'));
        $game->setDate(new \DateTime('2014-06-09 22:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);
        $this->addReference('match1', $game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BRESIL'));
        $game->setTeamB($this->getReference('ANGLETERRE'));
        $game->setDate(new \DateTime('2014-06-10 22:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);
        $this->addReference('match2', $game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BRESIL'));
        $game->setTeamB($this->getReference('CROATIE'));
        $game->setDate(new \DateTime('2014-06-12 22:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);


        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('MEXIQUE'));
        $game->setTeamB($this->getReference('CAMEROUN'));
        $game->setDate(new \DateTime('2014-06-13 18:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ESPAGNE'));
        $game->setTeamB($this->getReference('PAYS-BAS'));
        $game->setDate(new \DateTime('2014-06-13 21:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CHILI'));
        $game->setTeamB($this->getReference('AUSTRALIE'));
        $game->setDate(new \DateTime('2014-06-13 23:59:59'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COLOMBIE'));
        $game->setTeamB($this->getReference('GRECE'));
        $game->setDate(new \DateTime('2014-06-14 18:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('URUGUAY'));
        $game->setTeamB($this->getReference('COSTA RICA'));
        $game->setDate(new \DateTime('2014-06-14 21:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ANGLETERRE'));
        $game->setTeamB($this->getReference('ITALIE'));
        $game->setDate(new \DateTime('2014-06-14 23:59:59'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CÔTE D IVOIRE'));
        $game->setTeamB($this->getReference('JAPON'));
        $game->setDate(new \DateTime('2014-06-15 03:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);




        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('SUISSE'));
        $game->setTeamB($this->getReference('EQUATEUR'));
        $game->setDate(new \DateTime('2014-06-16 18:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('FRANCE'));
        $game->setTeamB($this->getReference('HONDURAS'));
        $game->setDate(new \DateTime('2014-06-16 21:00:00'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ARGENTINE'));
        $game->setTeamB($this->getReference('BOSNIE'));
        $game->setDate(new \DateTime('2014-06-16 23:59:59'));
        $game->setMainGame($this->getReference('MAINGAME'));
        $om->persist($game);

        $om->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}