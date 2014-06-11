<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZIMZIMBundlesWorldCupBundle:Default:index.html.twig');
    }
}
