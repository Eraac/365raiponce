<?php

namespace LKE\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;

class LoadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('load:all')
            ->setDescription('Load all from spreadhseet to database')
            ->addOption('force', null, InputOption::VALUE_NONE, 'use --force')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $force = $input->getOption('force');

        if ($force == "--force")
        {
            $commands = array("doctrine:database:drop", "doctrine:database:create", "doctrine:schema:update",
                              "load:users", "load:emotions", "load:themes", "load:remarks", "load:responses");

            $arguments = array(array('--force' => true),array(''),array('--force' => true),array(''),array(''),array(''),array(''),array(''),);

            foreach($commands as $key => $command)
            {
                $output->writeln("Run " . $command);

                $cmd = $this->getApplication()->find($command);

                $input = new ArrayInput($arguments[$key]);

                $cmd->run($input, $output);
            }

            $output->writeln("All loaded");
        }
        else
        {
            $output->writeln("All data will be lost! (use --force)");
        }
    }
}
