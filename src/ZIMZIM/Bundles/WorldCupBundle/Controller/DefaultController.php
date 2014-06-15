<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->container->get('doctrine')->getManager();

        $games = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->getListGameOfTheDay(new \DateTime('now'));

        $calculateRanking = $this->container->get('zimzim_bundles_worldcup.calculate.ranking');

        $rankings = $calculateRanking->calcul();

        return $this->render('ZIMZIMBundlesWorldCupBundle:Default:index.html.twig', array(
                'games' => $games,
                'rankings' => array_splice($rankings, 0, 3)
            ));
    }
}
