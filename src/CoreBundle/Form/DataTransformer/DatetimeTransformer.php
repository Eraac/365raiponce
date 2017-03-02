<?php

namespace CoreBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class DatetimeTransformer implements DataTransformerInterface
{
    /**
     * @param mixed $value
     *
     * @return \DateTime|null
     */
    public function transform($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     *
     * @throws TransformationFailedException
     *
     * @return \DateTime
     */
    public function reverseTransform($value)
    {
        if ($value !== "" && filter_var($value, FILTER_VALIDATE_INT) === false) {
            throw new TransformationFailedException(sprintf(
                "value '%s' is not a valid timestamp", $value
            ));
        }

        $datetime = \DateTime::createFromFormat('U', $value);

        if (false === $datetime) {
            throw new TransformationFailedException(sprintf(
                "value '%s' can not be convert to a DateTime", $value
            ));
        }

        return $datetime;
    }
}
