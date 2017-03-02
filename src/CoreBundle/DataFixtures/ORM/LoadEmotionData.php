<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Emotion;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadEmotionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $emotion = new Emotion();
        $emotion->setName("sad");

        $manager->persist($emotion);

        $manager->flush();

        $this->setReference("emotion-1", $emotion);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }
}
