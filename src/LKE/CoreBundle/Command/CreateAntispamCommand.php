<?php

namespace LKE\CoreBundle\Command;

use Sithous\AntiSpamBundle\Entity\SithousAntiSpamType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAntispamCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('load:antispam')
            ->setDescription('Load antispam configuration')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $identifier = "public_protection";

        $em = $this->getContainer()->get("doctrine")->getManager();

        $antispam = $em->getRepository('SithousAntiSpamBundle:SithousAntiSpamType')->findOneById($identifier);

        if (is_null($antispam))
        {
            $antispam = new SithousAntiSpamType();
            $antispam->setId($identifier)
                    ->setMaxCalls(10)
                    ->setMaxTime(3600)
                    ->setTrackIp(true)
                    ->setTrackUser(false);

            $em->persist($antispam);
            $em->flush();
        }

        $output->writeln("Antispam configured !");
    }
}
