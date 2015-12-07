<?php

namespace LKE\RemarkBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use LKE\RemarkBundle\Entity\Response;

class ResponseCommand extends ContainerAwareCommand
{
    const FILE = "https://docs.google.com/spreadsheets/d/1gwiWh7-ym2XSpBZvLDyDwOVVFF6BUOh2YVWOM0L0z8Q/pub?gid=962820783&single=true&output=csv";
    const SENTENCE = 1;
    const POSTEDAT = 2;
    const REMARK_ID = 3;
    const USER_ID = 4;

    protected function configure()
    {
        $this
            ->setName('load:responses')
            ->setDescription('Load responses from spreadhseet to database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $parser = $this->getContainer()->get('lke_core.parse_csv');

        $rows = $parser->parse(self::FILE);

        foreach($rows as $row)
        {
            $response = new Response();

            $response->setSentence(substr($row[self::SENTENCE], 0, 140));
            $response->setPostedAt($this->getDateTime($row[self::POSTEDAT]));
            $response->setRemark($this->getRemark($row[self::REMARK_ID]));
            $response->setAuthor($this->getUser($row[self::USER_ID]));

            $em->persist($response);
        }

        $em->flush();

        $output->writeln("Responses loaded");
    }

    private function getUser($id)
    {
        return $this->getContainer()->get('doctrine')->getRepository("LKEUserBundle:User")->find($id);
    }

    private function getDateTime($datetime)
    {
        return (empty($datetime)) ? null : \DateTime::createFromFormat("d/m/Y H:i:s", $datetime);
    }

    private function getRemark($id)
    {
        return $this->getContainer()->get('doctrine')->getRepository("LKERemarkBundle:Remark")->find($id);
    }
}
