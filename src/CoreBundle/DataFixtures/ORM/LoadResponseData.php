<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Response;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadResponseData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->disableEventsDoctrine(Response::class, $manager);

        $responsePublished = new Response();
        $responsePublished
            ->setAuthor($this->getReference('user-1'))
            ->setSentence('that sexist !')
            ->setPostedAt(new \DateTime())
            ->setRemark($this->getReference('remark-published-1'))
        ;

        $responseUnpublished = new Response();
        $responseUnpublished
            ->setAuthor($this->getReference('user-1'))
            ->setSentence('that sexist !')
            ->setRemark($this->getReference('remark-unpublished-1'))
        ;

        $manager->persist($responsePublished);
        $manager->persist($responseUnpublished);

        $manager->flush();

        $this->setReference('response-publish-1', $responsePublished);
        $this->setReference('response-unpublish-1', $responseUnpublished);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @param string        $class
     * @param ObjectManager $manager
     */
    private function disableEventsDoctrine(string $class, ObjectManager $manager)
    {
        $manager->getClassMetadata($class)->setLifecycleCallbacks([]);
    }
}
