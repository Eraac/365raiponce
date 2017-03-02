<?php

namespace CoreBundle\Form;

use CoreBundle\Entity\News;
use CoreBundle\Form\Type\AbstractApiType;
use CoreBundle\Form\Type\TimestampType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractApiType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message')
            ->add('start_at', TimestampType::class, ['property_path' => 'startAt'])
            ->add('end_at', TimestampType::class, ['property_path' => 'endAt'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => News::class,
        ));
    }
}
