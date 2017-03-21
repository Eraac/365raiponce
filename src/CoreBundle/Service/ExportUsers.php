<?php

namespace CoreBundle\Service;

use CoreBundle\Event\ExportUsersEvent;
use UserBundle\Mailer\Mailer;
use UserBundle\Repository\UserRepository;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class ExportUsers
 *
 * @package CoreBundle\Service
 */
class ExportUsers
{
    /**
     * @var UserRepository
     */
    private $repo;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * @var ArrayToCsv
     */
    private $encoder;


    /**
     * ExportUser constructor.
     *
     * @param UserRepository $repo
     * @param Mailer         $mailer
     * @param ArrayToCsv     $encoder
     */
    public function __construct(UserRepository $repo, Mailer $mailer, ArrayToCsv $encoder)
    {
        $this->repo = $repo;
        $this->mailer = $mailer;
        $this->encoder = $encoder;
    }

    /**
     * @param UserInterface $user
     */
    public function export(UserInterface $user)
    {
        $users = $this->repo->exportUsers();

        $filename = $this->encoder->transform($users, ['username', 'email']);

        $this->mailer->sendExportUsers($user, $filename);
    }

    /**
     * @param ExportUsersEvent $event
     */
    public function onExport(ExportUsersEvent $event)
    {
        $this->export($event->getUser());
    }
}
