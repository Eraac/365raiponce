<?php

namespace CoreBundle\Form;

use CoreBundle\Entity\Remark;
use CoreBundle\Form\Type\AbstractApiType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemarkEditType extends AbstractApiType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('theme')
            ->remove('emotion')
            ->remove('emotionScale')
            ->remove('email')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => Remark::class,
        ));
    }

    public function getParent()
    {
        return RemarkType::class;
    }
}
