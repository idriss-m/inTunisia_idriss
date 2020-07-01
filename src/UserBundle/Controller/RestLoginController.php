<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("login", pluralize=false)
 */
class RestLoginController extends AbstractFOSRestController implements ClassResourceInterface
{
    public function postAction()
    {
        // route handled by Lexik JWT Authentication Bundle
        throw new \DomainException('You should never see this');
    }
}
