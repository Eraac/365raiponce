<?php

namespace CoreBundle\Filter;

use CoreBundle\Exception\InvalidFilterException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;

abstract class AbstractFilter
{
    const DEFAULT_ORDER = 'ASC';
    const DEFAULT_METHOD_ORDER = 'applyOrder';

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @var EntityRepository
     */
    protected $repo;


    /**
     * AbstractFilter constructor.
     *
     * @param Translator $translator
     */
    public function __construct(Translator $translator, EntityRepository $repo)
    {
        $this->translator = $translator;
        $this->repo       = $repo;
    }

    /**
     * @param QueryBuilder $qb
     * @param array        $criterias
     *
     * @return QueryBuilder
     */
    public function applyFilter(QueryBuilder $qb, array $criterias) : QueryBuilder
    {
        foreach ($criterias as $key => $criteria) {
            $method = $this->getMethod($key);

            if (is_null($method)) {
                throw new InvalidFilterException(
                    $this->t('core.error.invalid_filter', ['%filter%' => $key])
                );
            }

            assert(is_callable($method), new \LogicException(
                sprintf('method for filter %s doesn\'t exist !', $key)
            ));

            $this->validate($key, $criteria);

            call_user_func_array($method, [$qb, $criteria]);
        }

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param array        $ordersBy
     *
     * @return QueryBuilder
     */
    protected function applyOrder(QueryBuilder $qb, array $ordersBy) : QueryBuilder
    {
        foreach ($ordersBy as $orderBy => $order) {
            $method = $this->getMethodOrderBy($orderBy);
            $order = empty($order) ? self::DEFAULT_ORDER : $order;

            if (is_null($method)) {
                throw new InvalidFilterException(
                    $this->t('core.error.invalid_order_by', ['%order_by%' => $orderBy])
                );
            }

            if (!$this->isValidOrder($order)) {
                throw new InvalidFilterException(
                    $this->t('core.error.invalid_order', ['%order%' => $orderBy])
                );
            }

            assert(is_callable($method), new \LogicException(
                sprintf('method for order by %s doesn\'t exist !', $orderBy)
            ));

            call_user_func_array($method, [$qb, $orderBy, $order]);
        }

        return $qb;
    }

    /**
     * @return array
     */
    protected function getMapping() : array
    {
        return [
            '_order' => [$this, 'applyOrder'],
        ];
    }

    /**
     * @return array
     */
    protected function getMappingOrderBy() : array
    {
        return [
            'id' => [$this->repo, self::DEFAULT_METHOD_ORDER],
        ];
    }

    /**
     * @return array
     */
    protected function getMappingValidate() : array
    {
        return [];
    }

    /**
     * @param $name
     *
     * @return array|null
     */
    protected function getMethod(string $name)
    {
        $methods = $this->getMapping();

        return $methods[$name] ?? null;
    }

    /**
     * @param $name
     *
     * @return array|null
     */
    protected function getMethodOrderBy(string $name)
    {
        $methods = $this->getMappingOrderBy();

        return $methods[$name] ?? null;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    protected function validate(string $key, $value)
    {
        $method = $this->getMappingValidate();

        if (isset($method[$key])) {

            assert(is_callable($method[$key]), new \LogicException(
                sprintf('method for validate %s doesn\'t exist !', $key)
            ));

            call_user_func($method[$key], $value);
        }
    }

    /**
     * @param string $order
     *
     * @return bool
     */
    private function isValidOrder(string $order) : bool
    {
        return in_array(strtoupper($order), ['ASC', 'DESC']);
    }

    /**
     * @param string $message
     * @param array  $parameters
     *
     * @return string
     */
    protected function t(string $message, array $parameters = []) : string
    {
        return $this->translator->trans($message, $parameters);
    }

    /**
     * @param $number
     * @param string $error
     *
     * @throws InvalidFilterException
     */
    protected function validateNumber($number, string $error = 'core.error.filter.number')
    {
        // filter_var with this filter return number if is good, and 0 is a good int
        // ... so without '=== false', will get false instead of true for 0

        if (is_array($number)) {
            foreach ($number as $num) {
                $valid = !(filter_var($num, FILTER_VALIDATE_INT) === false);

                if (!$valid) {
                    throw new InvalidFilterException(
                        $this->t($error, ['%number%' => $num])
                    );
                }
            }
        } else {
            $valid = !(filter_var($number, FILTER_VALIDATE_INT) === false);

            if (!$valid) {
                throw new InvalidFilterException(
                    $this->t($error, ['%number%' => $number])
                );
            }
        }
    }

    /**
     * @param $timestamp
     */
    protected function validateTimestamp($timestamp)
    {
        $this->validateNumber($timestamp, 'core.error.filter.timestamp');
    }
}
