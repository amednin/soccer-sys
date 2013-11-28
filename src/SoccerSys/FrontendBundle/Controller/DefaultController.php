<?php

namespace SoccerSys\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoccerSysFrontendBundle:Default:index.html.twig');
    }
}
