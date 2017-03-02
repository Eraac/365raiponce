<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\Remark;
use CoreBundle\Event\RemarkPublishedEvent;
use CoreBundle\Service\Facebook;
use CoreBundle\Service\Twitter;

class RemarkPublishedListener
{
    // https://github.com/heyupdate/emoji/blob/master/src/Index/CompiledIndex.php
    const GIFT_HEART = "\u{1f496}";

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var Twitter
     */
    private $twitter;

    /**
     * @var Facebook
     */
    private $facebook;


    /**
     * RemarkPublishedListener constructor.
     *
     * @param Twitter $twitter
     * @param Facebook $facebook
     * @param string $baseUrl
     */
    public function __construct(Twitter $twitter, Facebook $facebook, string $baseUrl)
    {
        $this->twitter  = $twitter;
        $this->facebook = $facebook;
        $this->baseUrl  = $baseUrl;
    }

    /**
     * @param RemarkPublishedEvent $event
     */
    public function onRemarkPublished(RemarkPublishedEvent $event)
    {
        $this->twitter->postTweet($this->formatMessageTwitter($event->getRemark()));
        $this->facebook->postPage($this->formatMessageFacebook($event->getRemark()));
    }

    /**
     * @param Remark $remark
     *
     * @return string
     */
    private function formatMessageTwitter(Remark $remark) : string
    {
        return sprintf(
            'Un nouvelle remarque est disponible, propose une réponse de princesse %s, %s #seximePasNotreGenre',
            $this->formatLink($remark),
            self::GIFT_HEART
        );
    }

    /**
     * @param Remark $remark
     *
     * @return string
     */
    private function formatMessageFacebook(Remark $remark) : string
    {
        return sprintf(
            '"%s"
             
             Propose une réponse de princesse %s %s #seximePasNotreGenre',
            $remark->getSentence(),
            $this->formatLink($remark),
            self::GIFT_HEART
        );
    }

    /**
     * @param Remark $remark
     *
     * @return string
     */
    private function formatLink(Remark $remark)
    {
        return $this->baseUrl . $remark->getId();
    }
}
