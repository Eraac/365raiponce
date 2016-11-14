<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Emotion;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEmotionData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $emotion = new Emotion();
        $emotion->setName("sad");

        $manager->persist($emotion);

        $manager->flush();
    }
}
