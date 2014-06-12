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
        $game->setTeamA($this->getReference('BRESIL'));
        $game->setTeamB($this->getReference('CROATIE'));
        $game->setDate(new \DateTime('2014-06-12 22:00:00'));
        $om->persist($game);


        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('MEXIQUE'));
        $game->setTeamB($this->getReference('CAMEROUN'));
        $game->setDate(new \DateTime('2014-06-13 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ESPAGNE'));
        $game->setTeamB($this->getReference('PAYS-BAS'));
        $game->setDate(new \DateTime('2014-06-13 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CHILI'));
        $game->setTeamB($this->getReference('AUSTRALIE'));
        $game->setDate(new \DateTime('2014-06-13 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COLOMBIE'));
        $game->setTeamB($this->getReference('GRECE'));
        $game->setDate(new \DateTime('2014-06-14 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('URUGUAY'));
        $game->setTeamB($this->getReference('COSTA RICA'));
        $game->setDate(new \DateTime('2014-06-14 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ANGLETERRE'));
        $game->setTeamB($this->getReference('ITALIE'));
        $game->setDate(new \DateTime('2014-06-14 23:59:59'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CÔTE D IVOIRE'));
        $game->setTeamB($this->getReference('JAPON'));
        $game->setDate(new \DateTime('2014-06-14 03:00:00'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('SUISSE'));
        $game->setTeamB($this->getReference('EQUATEUR'));
        $game->setDate(new \DateTime('2014-06-15 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('FRANCE'));
        $game->setTeamB($this->getReference('HONDURAS'));
        $game->setDate(new \DateTime('2014-06-15 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ARGENTINE'));
        $game->setTeamB($this->getReference('BOSNIE'));
        $game->setDate(new \DateTime('2014-06-15 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ALLEMAGNE'));
        $game->setTeamB($this->getReference('PORTUGAL'));
        $game->setDate(new \DateTime('2014-06-16 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('IRAN'));
        $game->setTeamB($this->getReference('NIGERIA'));
        $game->setDate(new \DateTime('2014-06-16 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('GHANA'));
        $game->setTeamB($this->getReference('ETATS-UNIS'));
        $game->setDate(new \DateTime('2014-06-16 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BELGIQUE'));
        $game->setTeamB($this->getReference('ALGERIE'));
        $game->setDate(new \DateTime('2014-06-17 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BRESIL'));
        $game->setTeamB($this->getReference('MEXIQUE'));
        $game->setDate(new \DateTime('2014-06-17 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('RUSSIE'));
        $game->setTeamB($this->getReference('COREE DU SUD'));
        $game->setDate(new \DateTime('2014-06-17 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('AUSTRALIE'));
        $game->setTeamB($this->getReference('PAYS-BAS'));
        $game->setDate(new \DateTime('2014-06-18 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ESPAGNE'));
        $game->setTeamB($this->getReference('CHILI'));
        $game->setDate(new \DateTime('2014-06-18 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CAMEROUN'));
        $game->setTeamB($this->getReference('CROATIE'));
        $game->setDate(new \DateTime('2014-06-18 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COLOMBIE'));
        $game->setTeamB($this->getReference('CÔTE D IVOIRE'));
        $game->setDate(new \DateTime('2014-06-19 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('URUGUAY'));
        $game->setTeamB($this->getReference('ANGLETERRE'));
        $game->setDate(new \DateTime('2014-06-19 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('JAPON'));
        $game->setTeamB($this->getReference('GRECE'));
        $game->setDate(new \DateTime('2014-06-19 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ITALIE'));
        $game->setTeamB($this->getReference('COSTA RICA'));
        $game->setDate(new \DateTime('2014-06-20 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('SUISSE'));
        $game->setTeamB($this->getReference('FRANCE'));
        $game->setDate(new \DateTime('2014-06-20 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('HONDURAS'));
        $game->setTeamB($this->getReference('EQUATEUR'));
        $game->setDate(new \DateTime('2014-06-20 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ARGENTINE'));
        $game->setTeamB($this->getReference('IRAN'));
        $game->setDate(new \DateTime('2014-06-21 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ALLEMAGNE'));
        $game->setTeamB($this->getReference('GHANA'));
        $game->setDate(new \DateTime('2014-06-21 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('NIGERIA'));
        $game->setTeamB($this->getReference('BOSNIE'));
        $game->setDate(new \DateTime('2014-06-21 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BELGIQUE'));
        $game->setTeamB($this->getReference('RUSSIE'));
        $game->setDate(new \DateTime('2014-06-22 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COREE DU SUD'));
        $game->setTeamB($this->getReference('ALGERIE'));
        $game->setDate(new \DateTime('2014-06-22 21:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ETATS-UNIS'));
        $game->setTeamB($this->getReference('PORTUGAL'));
        $game->setDate(new \DateTime('2014-06-22 23:59:59'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('AUSTRALIE'));
        $game->setTeamB($this->getReference('ESPAGNE'));
        $game->setDate(new \DateTime('2014-06-23 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('PAYS-BAS'));
        $game->setTeamB($this->getReference('CHILI'));
        $game->setDate(new \DateTime('2014-06-23 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CAMEROUN'));
        $game->setTeamB($this->getReference('BRESIL'));
        $game->setDate(new \DateTime('2014-06-23 22:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('CROATIE'));
        $game->setTeamB($this->getReference('MEXIQUE'));
        $game->setDate(new \DateTime('2014-06-23 22:00:00'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ITALIE'));
        $game->setTeamB($this->getReference('URUGUAY'));
        $game->setDate(new \DateTime('2014-06-24 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COSTA RICA'));
        $game->setTeamB($this->getReference('ANGLETERRE'));
        $game->setDate(new \DateTime('2014-06-24 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('JAPON'));
        $game->setTeamB($this->getReference('COLOMBIE'));
        $game->setDate(new \DateTime('2014-06-24 22:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('GRECE'));
        $game->setTeamB($this->getReference('CÔTE D IVOIRE'));
        $game->setDate(new \DateTime('2014-06-24 22:00:00'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('NIGERIA'));
        $game->setTeamB($this->getReference('ARGENTINE'));
        $game->setDate(new \DateTime('2014-06-25 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('BOSNIE'));
        $game->setTeamB($this->getReference('IRAN'));
        $game->setDate(new \DateTime('2014-06-25 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('HONDURAS'));
        $game->setTeamB($this->getReference('SUISSE'));
        $game->setDate(new \DateTime('2014-06-25 22:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('EQUATEUR'));
        $game->setTeamB($this->getReference('FRANCE'));
        $game->setDate(new \DateTime('2014-06-25 22:00:00'));
        $om->persist($game);



        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ETATS-UNIS'));
        $game->setTeamB($this->getReference('ALLEMAGNE'));
        $game->setDate(new \DateTime('2014-06-26 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('PORTUGAL'));
        $game->setTeamB($this->getReference('GHANA'));
        $game->setDate(new \DateTime('2014-06-26 18:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('COREE DU SUD'));
        $game->setTeamB($this->getReference('BELGIQUE'));
        $game->setDate(new \DateTime('2014-06-26 22:00:00'));
        $om->persist($game);

        $game = new Game();
        $game->setType('Match de poule');
        $game->setTeamA($this->getReference('ALGERIE'));
        $game->setTeamB($this->getReference('RUSSIE'));
        $game->setDate(new \DateTime('2014-06-26 22:00:00'));
        $om->persist($game);

        $om->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}