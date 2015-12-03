<?php

namespace LKE\RemarkBundle\Service;

use LKE\UserBundle\Entity\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use LKE\RemarkBundle\Entity\Response;

class GetResponse
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function getResponse($id, User $user)
    {
        $response = $this->getRepository()->find($id);

        if (null === $response) {
            throw new NotFoundHttpException('Sorry response is : ' + $id + ' not exist');
        }

        if (!$this->security->canAccess($response, $user)) {
            throw new AccessDeniedException();
        }

        return $response;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Response");
    }
}