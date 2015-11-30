<?php

namespace LKE\RemarkBundle\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetEmotion
{
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getEmotion($slug)
    {
        $emotion = $this->getRepository()->findBySlug($slug);

        if (null === $emotion) {
            throw new NotFoundHttpException('Sorry emotion slug : ' + $slug + ' not exist');
        }

        return $emotion;
    }

    private function getRepository()
    {
        return $this->doctrine->getRepository("LKERemarkBundle:Emotion");
    }
}