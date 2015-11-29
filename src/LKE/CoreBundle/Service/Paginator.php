<?php

namespace LKE\CoreBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class Paginator
{
    const MAX_DEFAULT = 10;

    public function getBorne(Request $request, $max = Paginator::MAX_DEFAULT)
    {
        $limit  = $request->query->get("limit", $max);
        $page   = $request->query->get("page", 1);

        $limit = ($limit > $max) ? $max : $limit;
        $limit = ($limit < 1) ? 1 : $limit; // On évite les nombres négatifs
        $page  = ($page  < 1) ? 1 : $page;

        return array($limit, $page);
    }
}
