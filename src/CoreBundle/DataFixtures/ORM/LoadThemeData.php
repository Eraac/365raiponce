<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Theme;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadThemeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $theme = new Theme();
        $theme->setName("theme");

        $manager->persist($theme);

        $manager->flush();

        $this->setReference('theme-1', $theme);
    }

    public function getOrder()
    {
        return 0;
    }
}
