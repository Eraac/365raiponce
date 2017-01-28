<?php

namespace CoreBundle\Event\History;

use CoreBundle\Entity\Remark;
use CoreBundle\Event\HistoryEvent;
use UserBundle\Entity\User;

class HistoryShareRemarkEvent extends HistoryEvent
{
    const NAME = 'core.history.share_remark';

    /**
     * @var Remark
     */
    protected $remark;

    /**
     * @var User
     */
    protected $user;


    /**
     * HistoryShareRemarkEvent constructor.
     *
     * @param string $action
     * @param Remark $remark
     * @param User $user
     */
    public function __construct(string $action, Remark $remark, User $user)
    {
        parent::__construct($action);

        $this->remark = $remark;
        $this->user = $user;
    }

    /**
     * @return Remark
     */
    public function getRemark() : Remark
    {
        return $this->remark;
    }

    /**
     * @return User
     */
    public function getUser() : User
    {
        return $this->user;
    }
}
