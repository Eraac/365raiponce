<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetTheme
{
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getTheme($slug)
    {
        $theme = $this->getRepository()->findBySlug($slug);

        if (null === $theme) {
            throw new NotFoundHttpException('Sorry theme slug : ' + $slug + ' not exist');
        }

        return $theme;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Theme");
    }
}