<?php

namespace LKE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LKE\CoreBundle\Security\Voter;

abstract class CoreController extends Controller
{
    protected function getEntity($id, $access = Voter::READ, array $options = array())
    {
        $options = $this->getOptions($options);

        return $this->get("lke_core.get_entity")->get($id, $access, $options);
    }

    protected function getRepository($name = null)
    {
        $name = (is_null($name)) ? $this->getRepositoryName() : $name;

        return $this->getDoctrine()->getRepository($name);
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

    private function getOptions(array $options)
    {
        $defaultOptions = [
            "repository" => $this->getRepositoryName(),
            "method" => "find"
        ];

        return array_merge($defaultOptions, $options);
    }

    abstract protected function getRepositoryName();
}
