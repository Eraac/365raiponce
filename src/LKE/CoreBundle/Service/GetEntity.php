<?php

namespace LKE\CoreBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use LKE\UserBundle\Service\Access;

class GetEntity
{
    private $doctrine;
    private $security;

    public function __construct($doctrine, Access $security)
    {
        $this->doctrine = $doctrine;
        $this->security = $security;
    }

    public function get($id, $repo, $user = null, $method = Access::READ)
    {
        $entity = (is_numeric($id)) ? $this->getRepository($repo)->find($id) : $this->getRepository($repo)->findBySlug($id);

        if (is_null($entity)) {
            throw new NotFoundHttpException('Sorry ' . $repo . ' : ' + $id + ' not exist'); // TODO Monolog ?
        }

        $method = $this->getMethod($method);

        if (!(method_exists($this->security, $method) && $this->security->$method($entity, $user))) {
            throw new AccessDeniedException(); // TODO Monolog ?
        }

        return $entity;
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

    private function getRepository($name)
    {
        return $this->doctrine->getRepository($name);
    }
}
