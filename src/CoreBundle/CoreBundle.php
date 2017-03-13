<?php

namespace CoreBundle;

use Doctrine\DBAL\Types\{IntegerType, Type};
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CoreBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        parent::boot();

        Type::overrideType('boolean', IntegerType::class);
    }
}
