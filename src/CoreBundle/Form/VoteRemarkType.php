<?php

namespace CoreBundle\Form;

use CoreBundle\Entity\VoteRemark;
use CoreBundle\Form\Type\AbstractApiType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoteRemarkType extends AbstractApiType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => VoteRemark::TYPES, 'description' => '0 => IS_SEXIST | 1 => ALREADY_LIVED'
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => VoteRemark::class,
        ));
    }
}
