<?php

namespace Tests\UserBundle\Filter\Stats;

use CoreBundle\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use Tests\CoreBundle\Filter\AbstractStatsFilterTest;
use UserBundle\Repository\UserRepository;

class UserFilterTest extends AbstractStatsFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('user.stats.user_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var UserRepository $repo */
        $repo = $this->get('user.user_repository');

        return $repo->count('r');
    }
}
