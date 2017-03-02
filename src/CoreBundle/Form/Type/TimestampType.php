<?php

namespace CoreBundle\Form\Type;

use CoreBundle\Form\DataTransformer\DatetimeTransformer;
use Symfony\Component\Form\AbstractType as Base;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimestampType extends Base
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addViewTransformer(
            new DatetimeTransformer()
        );
    }

    /**
     * @return string
     */
    public function getParent() : string
    {
        return TextType::class;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            "invalid_message" => "core.error.invalid_timestamp",
        ]);
    }
}
