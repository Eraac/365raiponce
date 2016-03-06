<?php

namespace LKE\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserCommand extends ContainerAwareCommand
{
    const FILE = "https://docs.google.com/spreadsheets/d/1gwiWh7-ym2XSpBZvLDyDwOVVFF6BUOh2YVWOM0L0z8Q/pub?gid=1491675980&single=true&output=csv";
    const EMAIL = 1;
    const USERNAME = 2;
    const PASSWORD = 3;
    const ROLE = 4;
    const CERTIF = 5;

    protected function configure()
    {
        $this
            ->setName('load:users')
            ->setDescription('Load users from spreadhseet to database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userManager = $this->getContainer()->get('fos_user.user_manager');
        $em = $this->getContainer()->get('doctrine')->getManager();
        $parser = $this->getContainer()->get('lke_core.parse_csv');

        $rows = $parser->parse(self::FILE);

        foreach($rows as $row)
        {
            $user = $userManager->createUser();
            $user->setEmail($row[self::EMAIL]);
            $user->setUsername($row[self::USERNAME]);
            $user->setPlainPassword($row[self::PASSWORD]);
            $user->addRole($row[self::ROLE]);
            $user->setCertificated($row[self::CERTIF]);
            $user->setEnabled(true);

            $userManager->updateUser($user, false);
        }

        $em->flush();

        $output->writeln("Users loaded");
    }
}
