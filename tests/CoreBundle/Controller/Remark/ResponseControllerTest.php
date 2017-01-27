<?php

namespace Tests\CoreBundle\Controller\Remark;

use CoreBundle\Entity\Remark;
use CoreBundle\Entity\Response;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ResponseRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class ResponseControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/remarks/';

    private static $id = 0;

    // === SETUP ===
    public static function tearDownAfterClass()
    {
        $container = static::createClient()->getContainer();

        /** @var EntityManager $em */
        $em = $container->get('doctrine.orm.entity_manager');

        /** @var ResponseRepository $repo */
        $repo = $em->getRepository('CoreBundle:Response');

        $response = $repo->find(self::$id);

        $em->remove($response);
        $em->flush();
    }

    // === CGET - PUBLISHED ===
    public function testCGetSuccessful()
    {
        $url = self::PREFIX_URL . self::REMARK_PUBLISHED_ID . '/responses';

        $this->isSuccessful(Request::METHOD_GET, $url);

        $embedded = $this->getResponseContent('_embedded');

        if (array_key_exists(0, $embedded['items'][0])) {
            $this->assertNotNull($embedded['items'][0]['posted_at']);
        }
    }

    public function testCGetNotFound()
    {
        $url = self::PREFIX_URL . '9876543210/responses';

        $this->isNotFound(Request::METHOD_GET, $url);
    }

    // === POST ===
    public function testPostSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'sentence' => 'super sentence',
        ];

        $url = self::PREFIX_URL . self::REMARK_PUBLISHED_ID . '/responses';

        $this->isSuccessful(Request::METHOD_POST, $url, $params, $headers);

        self::$id = $this->getResponseContent('id');

        $this->assertNotNull($this->getResponseContent('posted_at'));
    }

    public function testPostBadRequest()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . self::REMARK_PUBLISHED_ID . '/responses';

        $this->isBadRequest(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnauthorized()
    {
        $params = [
            'sentence' => 'super sentence',
        ];

        $url = self::PREFIX_URL . self::REMARK_PUBLISHED_ID . '/responses';

        $this->isUnauthorized(Request::METHOD_POST, $url, $params);
    }

    public function testPostForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'sentence' => 'super sentence',
        ];

        $url = self::PREFIX_URL . self::REMARK_UNPUBLISHED_ID . '/responses';

        $this->isForbidden(Request::METHOD_POST, $url, $params, $headers);
    }

    public function testPostNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'sentence' => 'super sentence',
        ];

        $url = self::PREFIX_URL . '9876543210/responses';

        $this->isNotFound(Request::METHOD_POST, $url, $params, $headers);
    }
}
