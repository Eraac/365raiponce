<?php

namespace CoreBundle\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class SerializerGroupsManager
{
    /**
     * @var RequestStack
     */
    private $requestStack;


    /**
     * AddSerializerGroups constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Add serializer group to the current request
     *
     * @param string $group
     */
    public function addGroup(string $group)
    {
        $request = $this->requestStack->getCurrentRequest();

        $viewAttribute = $request->attributes->get('_template');

        if (!is_null($viewAttribute)) {

            $groups = $viewAttribute->getSerializerGroups();

            $groups[] = $group;

            $viewAttribute->setSerializerGroups($groups);
        }
    }
}
