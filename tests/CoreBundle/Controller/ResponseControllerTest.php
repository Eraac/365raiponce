<?php

namespace Tests\CoreBundle\Controller;

use CoreBundle\Entity\Remark;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class ResponseControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/responses';


    // === CGET - UNPUBLISHED ===
    public function testCGetUnpublishedSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $url = self::PREFIX_URL . '/unpublished';

        $this->isSuccessful(Request::METHOD_GET, $url, [], $headers);
    }

    public function testCGetUnpublishedUnauthorized()
    {
        $url = self::PREFIX_URL . '/unpublished';

        $this->isUnauthorized(Request::METHOD_GET, $url);
    }

    public function testCGetUnpublishedForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/unpublished';

        $this->isForbidden(Request::METHOD_GET, $url, [], $headers);
    }

    // === GET ===
    public function testGetSuccessful()
    {
        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isSuccessful(Request::METHOD_GET, $url);

        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::RESPONSE_UNPUBLISHED_ID;

        $this->isSuccessful(Request::METHOD_GET, $url, [], $headers);
    }

    public function testGetUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::RESPONSE_UNPUBLISHED_ID;

        $this->isUnauthorized(Request::METHOD_GET, $url);
    }

    public function testGetForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . '/' . self::RESPONSE_UNPUBLISHED_ID;

        $this->isForbidden(Request::METHOD_GET, $url, [], $headers);
    }

    public function testGetNotFound()
    {
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url);
    }

    // === PATCH ===
    public function testPatchSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'sentence' => 'sentence edited',
        ];

        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isSuccessful(Request::METHOD_PATCH, $url, $params, $headers);

        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::RESPONSE_UNPUBLISHED_ID;

        $this->isSuccessful(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchBadRequest()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'bad-key' => 'edited',
        ];

        $url = self::PREFIX_URL . '/' . self::RESPONSE_UNPUBLISHED_ID;

        $this->isBadRequest(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchUnauthorized()
    {
        $params = [
            'sentence' => 'sentence edited',
        ];

        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isUnauthorized(Request::METHOD_PATCH, $url, $params);
    }

    public function testPatchForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'sentence' => 'sentence edited',
        ];

        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isForbidden(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchNotFound()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'sentence' => 'sentence edited',
        ];

        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_PATCH, $url, $params, $headers);
    }

    // === DELETE ===
    public function testDeleteSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $params = ['sentence' => 'i want to be delete !'];

        $url = '/remarks/' . self::REMARK_PUBLISHED_ID . '/responses';

        $this->isSuccessful(Request::METHOD_POST, $url, $params, $headers);

        $id = $this->getResponseContent('id');

        $url = self::PREFIX_URL . '/' . $id;

        $this->isSuccessful(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isUnauthorized(Request::METHOD_DELETE, $url);
    }

    public function testDeleteForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . '/' . self::RESPONSE_PUBLISHED_ID;

        $this->isForbidden(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteNotFound()
    {
        $headers = $this->getHeaderAdmin();
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_DELETE, $url, [], $headers);
    }
}
