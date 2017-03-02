<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Grade;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadGradeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = new Grade();
        $grade
            ->setName("grade")
            ->setScore(0)
        ;

        $manager->persist($grade);

        $manager->flush();

        $this->setReference('grade-1', $grade);
    }

    public function getOrder()
    {
        return 0;
    }
}
