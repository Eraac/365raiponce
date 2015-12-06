<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// TODO Fusionner avec les autres GetXXX
class GetRemark
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function getRemark($id, $user = null, $edit = false)
    {
        $remark = $this->getRepository()->find($id);

        if (null === $remark) {
            throw new NotFoundHttpException('Sorry remark id : ' + $id + ' not exist');
        }

        if ((!$edit && !$this->security->canRead($remark, $user)) ||
            ($edit && !$this->security->canWrite($remark, $user))) {
            throw new AccessDeniedException();
        }

        return $remark;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Remark");
    }
}
