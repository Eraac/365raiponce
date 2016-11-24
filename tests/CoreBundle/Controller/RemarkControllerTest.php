<?php

namespace Tests\CoreBundle\Controller;

use CoreBundle\Entity\Remark;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class RemarkControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/remarks';

    private static $idUnpublished = 0;
    private static $idPublished = 0;

    // === SETUP ===
    public static function setUpBeforeClass()
    {
        $container = static::createClient()->getContainer();

        /** @var EntityManager $em */
        $em = $container->get('doctrine.orm.entity_manager');

        /** @var ThemeRepository $themeRepo */
        $themeRepo = $container->get('core.theme_repository');

        /** @var EmotionRepository $emotionRepo */
        $emotionRepo = $container->get('core.emotion_repository');

        $remark = new Remark();
        $remark
            ->setContext("Context")
            ->setSentence("Sexist !")
            ->setTheme($themeRepo->find(self::THEME_ID))
            ->setEmotion($emotionRepo->find(self::EMOTION_ID))
            ->setScaleEmotion(5)
            ->setPostedAt(new \DateTime())
        ;
        
        $em->persist($remark);
        $em->flush();
        
        self::$idPublished = $remark->getId();
    }

    // === CGET ===
    public function testCGetSuccessful()
    {
        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL);
    }

    // === POST ===
    public function testPostSuccessful()
    {
        $params = [
            "context" => "Je suis le contexte",
            "sentence" => "Je suis la phrase super sexiste",
            "theme" => self::THEME_ID,
            "emotion" => self::EMOTION_ID,
            "scaleEmotion" => 5,
            "email" => "fake@email.com",
        ];

        $this->isSuccessful(Request::METHOD_POST, self::PREFIX_URL, $params);

        self::$idUnpublished = $this->getResponseContent('id');
    }

    public function testPostBadRequest()
    {
        $params = [
            "context" => "Je suis le contexte",
            "sentence" => "Je suis la phrase super sexiste",
            "theme" => 0,
            "emotion" => self::EMOTION_ID,
            "scaleEmotion" => 5
        ];

        $this->isBadRequest(Request::METHOD_POST, self::PREFIX_URL, $params);

        unset($params['emotion']);

        $params['theme'] = 1;

        $this->isBadRequest(Request::METHOD_POST, self::PREFIX_URL, $params);
    }

    // === GET ===
    public function testGetSuccessful()
    {
        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL . '/' . self::$idPublished);
    }

    public function testGetUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::PREFIX_URL . '/' . self::$idUnpublished);
    }

    public function testGetForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        
        $this->isForbidden(Request::METHOD_GET, self::PREFIX_URL . '/' . self::$idUnpublished, [], $headers);
    }

    public function testGetNotFound()
    {
        $this->isNotFound(Request::METHOD_GET, self::PREFIX_URL . '/1234');
    }

    // === PATCH ===
    public function testPatchSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $params = [
            "sentence" => "Edited sentence",
        ];

        $this->isSuccessful(Request::METHOD_PATCH, self::PREFIX_URL . '/' . self::$idUnpublished, $params, $headers);
    }

    public function testPatchBadRequest()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $params = [
            "scaleEmotion" => 6,
        ];

        $this->isSuccessful(Request::METHOD_PATCH, self::PREFIX_URL . '/' . self::$idUnpublished, $params, $headers);
    }

    public function testPatchUnauthorized()
    {
        $params = [
            "sentence" => "Edited sentence",
        ];

        $this->isUnauthorized(Request::METHOD_PATCH, self::PREFIX_URL . '/' . self::$idUnpublished, $params);
    }

    public function testPatchForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            "sentence" => "Edited sentence",
        ];

        $this->isForbidden(Request::METHOD_PATCH, self::PREFIX_URL . '/' . self::$idUnpublished, $params, $headers);
    }

    public function testPatchNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $params = [
            "sentence" => "Edited sentence",
        ];

        $this->isNotFound(Request::METHOD_PATCH, self::PREFIX_URL . '/12345', $params, $headers);
    }

    // === DELETE ===

    public function testDeleteUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_DELETE, self::PREFIX_URL . '/' . self::$idUnpublished);
    }

    public function testDeleteForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_DELETE, self::PREFIX_URL . '/' . self::$idUnpublished, [], $headers);
    }

    public function testDeleteSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $this->isSuccessful(Request::METHOD_DELETE, self::PREFIX_URL . '/' . self::$idUnpublished, [], $headers);
        $this->isSuccessful(Request::METHOD_DELETE, self::PREFIX_URL . '/' . self::$idPublished, [], $headers);
    }

    public function testDeleteNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $this->isNotFound(Request::METHOD_DELETE, self::PREFIX_URL . '/' . self::$idUnpublished, [], $headers);
    }
}
