<?php


namespace ZIMZIM\Bundles\WorldCupBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserClientGame;
use ZIMZIM\Bundles\WorldCupBundle\Event\ClientGameEvent;
use ZIMZIM\Bundles\WorldCupBundle\ZIMZIMWorldCupEvents;

class RegisterClientGameSubscriber implements EventSubscriberInterface
{
    private $em;
    private $userclientgame;

    public function __construct(EntityManager $em, UserClientGame $userclientgame)
    {
        $this->em = $em;
        $this->userclientgame = $userclientgame;
    }

    public static function getSubscribedEvents()
    {
        return array(
            ZIMZIMWorldCupEvents::REGISTER_CLIENTGAME => 'onUpdateGame',
        );
    }

    public function onUpdateGame(ClientGameEvent $event)
    {
        $clientGame = $event->getClientGame();

        $userclientgame = $this->userclientgame;

        $userclientgame->setUser($clientGame->getUser());
        $userclientgame->setClientGame($clientGame);
        $userclientgame->setAdmin(true);
        $userclientgame->setEnabled(true);
        $userclientgame->setRequest(false);
        $this->em->persist($userclientgame);
        $this->em->flush();
    }
}