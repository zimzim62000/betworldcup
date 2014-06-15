<?php


namespace ZIMZIM\Bundles\WorldCupBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use ZIMZIM\Bundles\WorldCupBundle\Calculate\Score;
use ZIMZIM\Bundles\WorldCupBundle\Event\ScoreEvent;
use ZIMZIM\Bundles\WorldCupBundle\ZIMZIMWorldCupEvents;

class ScoreSubscriber implements EventSubscriberInterface
{
    private $em;
    private $calculateScore;

    public function __construct(EntityManager $em, Score $calculateScore)
    {
        $this->em = $em;
        $this->calculateScore = $calculateScore;
    }

    public static function getSubscribedEvents()
    {
        return array(
            ZIMZIMWorldCupEvents::UPDATE_SCORE => 'onUpdateGame',
        );
    }

    public function onUpdateGame(ScoreEvent $event)
    {
        $game = $event->getGame();

        $this->calculateScore->calcul($game);

    }
}
