<?php

namespace CoreBundle\Service;

use Abraham\TwitterOAuth\TwitterOAuth;
use Abraham\TwitterOAuth\TwitterOAuthException;
use Monolog\Logger;

/**
 * Class Twitter (using twitteroauth https://twitteroauth.com/)
 *
 * @package CoreBundle\Service
 */
class Twitter
{
    const URL_POST_TWEET = "statuses/update";

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var string
     */
    private $consumerKey;

    /**
     * @var string
     */
    private $consumerSecret;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $tokenSecret;

    /**
     * @var boolean
     */
    private $isEnable;

    /**
     * Twitter constructor.
     *
     * @param Logger $logger
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $token
     * @param string $tokenSecret
     * @param bool   $isEnable
     */
    public function __construct(Logger $logger, string $consumerKey, string $consumerSecret, string $token, string $tokenSecret, bool $isEnable)
    {
        $this->logger           = $logger;
        $this->consumerKey      = $consumerKey;
        $this->consumerSecret   = $consumerSecret;
        $this->token            = $token;
        $this->tokenSecret      = $tokenSecret;
        $this->isEnable         = $isEnable;
    }

    /**
     * @param $status
     */
    public function postTweet($status)
    {
        if (!$this->isEnable) {
            return;
        }

        try {
            $connection = $this->getConnection();

            $response = $connection->post(self::URL_POST_TWEET, ['status' => $status]);

            if (array_key_exists('errors', $response) && !empty($response['errors'])) {
                $this->logger->error(explode('|', $response['errors']), ['client' => 'twitter', 'status_code' => $connection->getLastHttpCode()]);
            }
        } catch (TwitterOAuthException $exception) {
            $this->logger->critical($exception->getMessage(), ['client' => 'twitter']);
        }
    }

    /**
     * @return TwitterOAuth
     */
    private function getConnection() : TwitterOAuth
    {
        $connection = new TwitterOAuth(
                $this->consumerKey,
                $this->consumerSecret,
                $this->token,
                $this->tokenSecret
            );

        return $connection;
    }
}
