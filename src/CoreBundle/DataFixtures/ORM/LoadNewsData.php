<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\News;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $newsCurrent = new News();
        $newsCurrent
            ->setMessage('great message')
            ->setStartAt(new \DateTime('now -1 day'))
            ->setEndAt(new \DateTime('now +1 day'))
        ;

        $newsOver = new News();
        $newsOver
            ->setMessage('great message')
            ->setStartAt(new \DateTime('now -2 day'))
            ->setEndAt(new \DateTime('now -1 day'))
        ;

        $manager->persist($newsCurrent);
        $manager->persist($newsOver);

        $manager->flush();

        $this->setReference('news-current', $newsCurrent);
        $this->setReference('news-over', $newsOver);
    }

    public function getOrder()
    {
        return 0;
    }
}
