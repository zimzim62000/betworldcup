<?php

namespace ZIMZIM\Bundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZIMZIMBundlesUserBundle:Default:index.html.twig');
    }
}
