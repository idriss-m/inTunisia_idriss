<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("profile", pluralize=false)
 */
class RestProfileController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Get("/profile/{user}")
     * @ParamConverter("user", class="UserBundle:User")
     */
    public function getAction(UserInterface $user)
    {
        if ($user !== $this->getUser()) {
            throw new AccessDeniedHttpException();
        }

        return $user;
    }
}