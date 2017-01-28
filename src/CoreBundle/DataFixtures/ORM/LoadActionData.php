<?php

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Action;
use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;

class LoadActionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $actions = [
            ['name' => Action::PUBLISH_RESPONSE, 'limit_per_day' => 7,    'point' => 3, 'description' => 'publish response'],
            ['name' => Action::GIVE_VOTE,        'limit_per_day' => 10,   'point' => 1, 'description' => 'give vote'],
            ['name' => Action::RECEIVE_VOTE,     'limit_per_day' => null, 'point' => 2, 'description' => 'receive vote'],
            ['name' => Action::SHARE,            'limit_per_day' => 5,    'point' => 1, 'description' => 'share'],
        ];

        foreach ($actions as $key => $action) {
            $ac = new Action();

            $ac
                ->setEventName($action['name'])
                ->setDescription($action['description'])
                ->setLimitPerDay($action['limit_per_day'])
                ->setPoint($action['point'])
            ;

            $manager->persist($ac);

            $this->setReference('event-' . ($key + 1) , $ac);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
