<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use LKE\UserBundle\Service\Access;

class GetResponse
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function getResponse($id, $user = null, $method = Access::READ)
    {
        $response = $this->getRepository()->find($id);

        if (null === $response) {
            throw new NotFoundHttpException('Sorry response is : ' + $id + ' not exist');
        }

        $method = $this->getMethod($method);

        if (!(method_exists($this->security, $method) && $this->security->$method($response, $user))) {
            throw new AccessDeniedException();
        }

        return $response;
    }

    private function getMethod($method)
    {
        switch($method)
        {
            case Access::READ:
                return "canRead";

            case Access::EDIT:
                return "canEdit";

            case Access::DELETE:
                return "canDelete";

            default:
                return "canRead";
        }
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Response");
    }
}
