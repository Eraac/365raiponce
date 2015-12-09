<?php

namespace LKE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

abstract class CorsController extends Controller
{
    public function preflightAction()
    {
        return new Response();
    }
}
