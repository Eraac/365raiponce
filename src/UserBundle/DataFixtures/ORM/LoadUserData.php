<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\{AbstractFixture, OrderedFixtureInterface};
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin
            ->setUsername('admin')
            ->addRole('ROLE_ADMIN')
            ->setEmail('admin@localhost.tld')
            ->setPlainPassword('admin')
        ;

        $user1 = new User();
        $user1
            ->setConfirmed(true)
            ->setUsername('user1')
            ->setEmail('user1@localhost.tld')
            ->setPlainPassword('userpass')
        ;

        $user2 = new User();
        $user2
            ->setUsername('user2')
            ->setEmail('user2@localhost.tld')
            ->setPlainPassword('userpass')
        ;

        $manager->persist($userAdmin);
        $manager->persist($user1);
        $manager->persist($user2);

        $manager->flush();

        $this->setReference('user-admin', $userAdmin);
        $this->setReference('user-1', $user1);
        $this->setReference('user-2', $user2);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }
}
