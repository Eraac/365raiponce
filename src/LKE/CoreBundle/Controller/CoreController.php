<?php

namespace LKE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LKE\UserBundle\Service\Access;

abstract class CoreController extends Controller
{
    protected function getEntity($id, $access = Access::READ, $repositoryName = null)
    {
        $repositoryName = (is_null($repositoryName)) ? $this->getRepositoryName() : $repositoryName;

        return $this->get("lke_core.get_entity")->get($id, $repositoryName, $this->getUser(), $access);
    }

    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository($this->getRepositoryName());
    }

    protected function getAllErrors($form)
    {
        $errorsString = array();

        foreach ($form->all() as $child)
        {
            $errors = $child->getErrors(true, false);

            foreach($errors as $error) {
                $errorsString[$child->getName()] = $error->getMessage();
            }
        }

        return $errorsString;
    }

    abstract protected function getRepositoryName();
}
