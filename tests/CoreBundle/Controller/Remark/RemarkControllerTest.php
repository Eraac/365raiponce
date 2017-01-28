<?php

namespace Tests\CoreBundle\Controller\Remark;

use CoreBundle\Entity\Remark;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class RemarkControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/remarks';

    private static $id = 0;

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
        ;

        $em->persist($remark);
        $em->flush();

        self::$id = $remark->getId();
    }

    // === POST - PUBLISH ===
    public function testPostPublishSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/publish';

        $this->isSuccessful(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::$id . '/publish';

        $this->isUnauthorized(Request::METHOD_POST, $url);
    }

    public function testPostPublishForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/publish';

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/1234/publish';

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishConflict()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/publish';

        $this->isConflict(Request::METHOD_POST, $url, [], $headers);
    }

    // === POST - SHARE ===
    public function testPostShareSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::REMARK_PUBLISHED_ID . '/share';

        $this->isSuccessful(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostShareUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::REMARK_PUBLISHED_ID . '/share';

        $this->isUnauthorized(Request::METHOD_POST, $url);
    }

    public function testPostShareForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::REMARK_UNPUBLISHED_ID . '/share';

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostShareNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/9876543210/share';

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostShareConflict()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::REMARK_PUBLISHED_ID . '/share';

        $this->isConflict(Request::METHOD_POST, $url, [], $headers);
    }

    // === POST - UNPUBLISH ===
    public function testPostUnpublishSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/unpublish';

        $this->isSuccessful(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::$id . '/unpublish';

        $this->isUnauthorized(Request::METHOD_POST, $url);
    }

    public function testPostUnpublishForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/unpublish';

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/1234/unpublish';

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishConflict()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '/' . self::$id . '/unpublish';

        $this->isConflict(Request::METHOD_POST, $url, [], $headers);
    }
}
