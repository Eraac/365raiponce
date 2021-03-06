<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\LogRequest;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class LogRequestListener
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var bool
     */
    private $isEnable;


    /**
     * LogRequestListener constructor.
     *
     * @param Logger $logger
     * @param TokenStorage $tokenStorage
     */
    public function __construct(Logger $logger, TokenStorage $tokenStorage, EntityManager $entityManager, $isEnable)
    {
        $this->logger       = $logger;
        $this->tokenStorage = $tokenStorage;
        $this->em           = $entityManager;
        $this->isEnable     = $isEnable;
    }

    public function onKernelTerminate(PostResponseEvent $event)
    {
        /** @var Request $request */
        $request = $event->getRequest();

        if (!$this->isEnable || !$this->isLoggableRequest($request)) {
            return;
        }

        try {
            /** @var Response $response */
            $response = $event->getResponse();

            $route = $request->get('_route');

            $content = $this->cleanSensitiveContent($route, $request->getContent());

            $token = $this->tokenStorage->getToken();
            $user = !is_null($token) ? $token->getUser() : null;

            $logRequest = new LogRequest();
            $logRequest
                ->setRoute($route)
                ->setPath($request->getPathInfo())
                ->setMethod($request->getMethod())
                ->setQuery(urldecode($request->getQueryString()))
                ->setContent($content)
                ->setStatus($response->getStatusCode())
                ->setIp($request->getClientIp())
                ->setUser(!is_string($user) ? $user : null)
                ->setCreatedAt(new \DateTime()) // necessary because without doctrine set NULL and mysql return an error (field can't be null)
            ;

            if ($this->logResponse($response)) {
                $logRequest->setResponse($response->getContent());
            }

            $this->em->persist($logRequest);
            $this->em->flush();
        } catch (\Exception $e) {
            $this->logger->error(
                sprintf("LogRequest couldn't be persist : %s", $e->getMessage())
            );
        }
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    private function isLoggableRequest(Request $request) : bool
    {
        $notLoggableMethods = [
            Request::METHOD_HEAD,
            Request::METHOD_OPTIONS,
        ];

        $notLoggableRoutes = [
            'nelmio_api_doc_index',
            'api_get_log_requests',
            'api_get_log_request',
        ];

        $route = $request->get('_route') ?? '_';

        return
            !in_array($request->getMethod(), $notLoggableMethods)
            && '_' !== $route[0]
            && !in_array($route, $notLoggableRoutes);
    }

    /**
     * @param string $route
     * @param string $content
     *
     * @return string
     */
    private function cleanSensitiveContent($route, $content)
    {
        $sensitiveRoutes = [
            "fos_oauth_server_token",
            "api_reset_user_password",
            "api_patch_user",
            "api_patch_me",
        ];

        if (in_array($route, $sensitiveRoutes)) {
            $content = json_decode($content, true);

            if (isset($content['password'])) {
                $content['password'] = "******";
            }
        }

        return empty($content) ? null : json_encode($content);
    }

    /**
     * @param Response $response
     *
     * @return bool
     */
    private function logResponse(Response $response) : bool
    {
        return $response->isClientError() || $response->isServerError();
    }
}
