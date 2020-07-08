<?php

namespace DestinationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DestinationBundle:Default:index.html.twig');
    }
}
