<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\Controller\ZimzimController;


/**
 * Game controller.
 *
 */
class ScoreController extends ZimzimController
{
    public function indexAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getManager();

        $games = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->getGamePlayedByDate(new \DateTime('now'));

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Score:index.html.twig',
            array(
                'games' => $games
            )
        );
    }


    public function rankingAction(){

        $calculateRanking = $this->container->get('zimzim_bundles_worldcup.calculate.ranking');

        $ranking = $calculateRanking->calcul();

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Score:ranking.html.twig',
            array(
                'rankings' => $ranking
            )
        );
    }
}