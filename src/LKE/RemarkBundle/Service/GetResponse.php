<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class GetResponse
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function getResponse($id, $user = null, $edit = false)
    {
        $response = $this->getRepository()->find($id);

        if (null === $response) {
            throw new NotFoundHttpException('Sorry response is : ' + $id + ' not exist');
        }

        if ((!$edit && !$this->security->canRead($response, $user)) ||
             ($edit && !$this->security->canWrite($response, $user))) {
            throw new AccessDeniedException();
        }

        return $response;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Response");
    }
}
