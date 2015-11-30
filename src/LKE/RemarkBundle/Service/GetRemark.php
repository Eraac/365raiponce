<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class GetRemark
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function getRemark($id)
    {
        $remark = $this->getRepository()->find($id);

        if (null === $remark) {
            throw new NotFoundHttpException('Sorry remark id : ' + $id + ' not exist');
        }

        if (!$this->security->canAccess($remark)) {
            throw new AccessDeniedException();
        }

        return $remark;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Remark");
    }
}