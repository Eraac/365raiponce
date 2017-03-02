<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Remark;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadRemarkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $remarkPublisheded = new Remark();
        $remarkPublisheded
            ->setSentence('sexist')
            ->setContext('context')
            ->setTheme($this->getReference('theme-1'))
            ->setEmotion($this->getReference('emotion-1'))
            ->setScaleEmotion(5)
            ->setPostedAt(new \DateTime())
        ;

        $remarkUnpublished = new Remark();
        $remarkUnpublished
            ->setSentence('sexist')
            ->setContext('context')
            ->setTheme($this->getReference('theme-1'))
            ->setEmotion($this->getReference('emotion-1'))
            ->setScaleEmotion(3)
        ;

        $manager->persist($remarkPublisheded);
        $manager->persist($remarkUnpublished);

        $manager->flush();

        $this->setReference('remark-published-1', $remarkPublisheded);
        $this->setReference('remark-unpublished-1', $remarkUnpublished);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
