<?php

namespace CoreBundle\Service;

use CoreBundle\Entity\VoteRemark;
use CoreBundle\Exception\InvalidFilterException;
use CoreBundle\Repository\RemarkRepository;
use CoreBundle\Repository\ResponseRepository;
use CoreBundle\Repository\VoteRemarkRepository;
use CoreBundle\Repository\VoteResponseRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\HttpFoundation\RequestStack;
use UserBundle\Repository\UserRepository;

class RetrieveStats
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var Translator
     */
    private $translator;


    /**
     * RetrieveStats constructor.
     *
     * @param EntityManager $em
     * @param RequestStack  $requestStack
     * @param Translator $translator
     */
    public function __construct(EntityManager $em, RequestStack $requestStack, Translator $translator)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
        $this->translator = $translator;
    }

    /**
     * @return array
     */
    public function stats() : array
    {
        $from   = $this->getDatetimeInRequest('from', 'now -30days');
        $to     = $this->getDatetimeInRequest('to', 'now');

        /** @var RemarkRepository $remarkRepo */
        $remarkRepo = $this->getRepository('CoreBundle:Remark');

        /** @var ResponseRepository $responseRepo */
        $responseRepo = $this->getRepository('CoreBundle:Response');

        /** @var UserRepository $userRepo */
        $userRepo = $this->getRepository('UserBundle:User');

        /** @var VoteRemarkRepository $voteRemarkRepo */
        $voteRemarkRepo = $this->getRepository('CoreBundle:VoteRemark');

        /** @var VoteResponseRepository $voteResponseRepo */
        $voteResponseRepo = $this->getRepository('CoreBundle:VoteResponse');

        return [
            "count_remarks_publish"        => $remarkRepo->countPublished($from, $to),
            "count_remarks_unpublish"      => $remarkRepo->countUnpublished($from, $to),
            "count_reponses_publish"       => $responseRepo->countPublished($from, $to),
            "count_response_unpublish"     => $responseRepo->countUnpublished($from, $to),
            "count_users"                  => $userRepo->countAll($from, $to),
            "count_votes_remarks_sexist"   => $voteRemarkRepo->countAll($from, $to, VoteRemark::IS_SEXIST),
            "count_votes_remarks_lived"    => $voteRemarkRepo->countAll($from, $to, VoteRemark::ALREADY_LIVED),
            "count_votes_responses"        => $voteResponseRepo->countAll($from, $to),
        ];
    }

    /**
     * @param string $name
     *
     * @return EntityRepository
     */
    private function getRepository(string $name) : EntityRepository
    {
        return $this->em->getRepository($name);
    }

    /**
     * @param string $key
     * @param string $default
     *
     * @throws InvalidFilterException
     *
     * @return \DateTime
     */
    private function getDatetimeInRequest(string $key, string $default) : \DateTime
    {
        $request = $this->requestStack->getCurrentRequest();

        $filters = $request->query->get('filter');

        $timestamp = isset($filters[$key]) ? $filters[$key] : null;

        $date = is_null($timestamp) ?
            new \DateTime($default) :
            \DateTime::createFromFormat('U', $timestamp);

        if (false === $date) {
            throw new InvalidFilterException(
                $this->translator->trans('core.error.filter.timestamp', ['%number%' => $timestamp])
            );
        }

        return $date;
    }
}
