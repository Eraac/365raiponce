<?php

namespace LKE\RemarkBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use LKE\RemarkBundle\Entity\Remark;

class RemarkCommand extends ContainerAwareCommand
{
    const FILE = "https://docs.google.com/spreadsheets/d/1gwiWh7-ym2XSpBZvLDyDwOVVFF6BUOh2YVWOM0L0z8Q/pub?gid=1852160784&single=true&output=csv";
    const SENTENCE = 1;
    const CONTEXTE = 2;
    const POSTEDAT = 3;
    const THEME_ID = 4;
    const EMOTION_ID = 5;
    const SCALE_EMOTION = 6;
    const EMAIL = 7;

    protected function configure()
    {
        $this
            ->setName('load:remarks')
            ->setDescription('Load remarks from spreadhseet to database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $parser = $this->getContainer()->get('lke_core.parse_csv');

        $rows = $parser->parse(self::FILE);

        foreach($rows as $row)
        {
            $remark = new Remark();

            $remark->setSentence(substr($row[self::SENTENCE], 0, 140));
            $remark->setContext($row[self::CONTEXTE]);
            $remark->setPostedAt($this->getDateTime($row[self::POSTEDAT]));
            $remark->setScaleEmotion($row[self::SCALE_EMOTION]);
            $remark->setEmail($this->getEmail($row[self::EMAIL]));
            $remark->setTheme($this->getTheme($row[self::THEME_ID]));
            $remark->setEmotion($this->getEmotion($row[self::EMOTION_ID]));

            $em->persist($remark);
        }

        $em->flush();

        $output->writeln("Remarks loaded");
    }

    private function getDateTime($datetime)
    {
        return (empty($datetime)) ? null : \DateTime::createFromFormat("d/m/Y H:i:s", $datetime);
    }

    private function getTheme($id)
    {
        return $this->getContainer()->get('doctrine')->getRepository("LKERemarkBundle:Theme")->find($id);
    }

    private function getEmotion($id)
    {
        return $this->getContainer()->get('doctrine')->getRepository("LKERemarkBundle:Emotion")->find($id);
    }

    private function getEmail($email)
    {
        return (empty($email)) ? null : $email;
    }
}
