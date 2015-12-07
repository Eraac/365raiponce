<?php

namespace LKE\RemarkBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use LKE\RemarkBundle\Entity\Theme;

class ThemeCommand extends ContainerAwareCommand
{
    const FILE = "https://docs.google.com/spreadsheets/d/1gwiWh7-ym2XSpBZvLDyDwOVVFF6BUOh2YVWOM0L0z8Q/pub?gid=0&single=true&output=csv";
    const NAME = 1;

    protected function configure()
    {
        $this
            ->setName('load:themes')
            ->setDescription('Load themes from spreadhseet to database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $parser = $this->getContainer()->get('lke_core.parse_csv');

        $rows = $parser->parse(self::FILE);

        foreach($rows as $row)
        {
            $theme = new Theme();
            $theme->setName(substr($row[self::NAME], 0, 30));

            $em->persist($theme);
        }

        $em->flush();

        $output->writeln("Themes loaded");
    }
}
