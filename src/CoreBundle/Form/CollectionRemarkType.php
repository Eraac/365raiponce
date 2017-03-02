<?php

namespace CoreBundle\Form;

use CoreBundle\Form\Type\AbstractApiType;
use CoreBundle\Model\CollectionRemark;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectionRemarkType extends AbstractApiType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('remarks', CollectionType::class, [
                'entry_type' => RemarkType::class,
                'allow_add' => true,
                'error_bubbling' => false,
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
            'data_class' => CollectionRemark::class,
        ));
    }
}
