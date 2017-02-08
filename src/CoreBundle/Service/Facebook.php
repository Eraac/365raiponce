<?php

namespace CoreBundle\Service;

use Facebook\Exceptions\FacebookSDKException;
use Monolog\Logger;
use Facebook\Facebook as FacebookClient;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Facebook
 *
 * @package CoreBundle\Service
 */
class Facebook
{
    const GRAPH_VERSION = 'v2.8';

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var string
     */
    private $pageId;

    /**
     * @var string
     */
    private $appId;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var boolean
     */
    private $isEnable;


    /**
     * Facebook constructor.
     *
     * @param Logger $logger
     * @param string $pageId
     * @param string $appId
     * @param string $token
     * @param string $secret
     * @param bool   $isEnable
     */
    public function __construct(Logger $logger, string $pageId, string $appId, string $token, string $secret, bool $isEnable)
    {
        $this->logger   = $logger;
        $this->pageId   = $pageId;
        $this->appId    = $appId;
        $this->token    = $token;
        $this->secret   = $secret;
        $this->isEnable = $isEnable;
    }

    /**
     * @param string $message
     */
    public function postPage(string $message)
    {
        if (!$this->isEnable) {
            return;
        }

        try {
            $client = $this->getFacebookClient();

            $client->sendRequest(
                Request::METHOD_POST,
                sprintf('/%s/feed', $this->pageId),
                ['message' => $message],
                $this->token
            );
        } catch (FacebookSDKException $exception) {
            $this->logger->critical($exception->getMessage(), ['client' => 'facebook']);
        }
    }

    /**
     * @return FacebookClient
     */
    private function getFacebookClient() : FacebookClient
    {
        $facebook = new FacebookClient([
            'app_id' => $this->appId,
            'app_secret' => $this->secret,
            'default_graph_version' => self::GRAPH_VERSION
        ]);

        return $facebook;
    }
}
