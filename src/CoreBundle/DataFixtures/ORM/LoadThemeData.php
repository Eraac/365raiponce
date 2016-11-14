<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Theme;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadThemeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $theme = new Theme();
        $theme->setName("theme");

        $manager->persist($theme);

        $manager->flush();
    }
}
