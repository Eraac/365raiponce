<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\History\HistoryResponsePublished;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadHistoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $history = new HistoryResponsePublished();

        $history
            ->setResponse($this->getReference('response-publish-1'))
            ->setUser($this->getReference('user-1'))
            ->setAction($this->getReference('action-1'))
        ;

        $manager->persist($history);

        $manager->flush();

        $this->setReference('history-response-published-1', $history);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}
