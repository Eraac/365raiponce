<?php

namespace LKE\RemarkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RemarkType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('context', 'text')
            ->add('sentence', 'textarea')
            ->add('theme', 'entity', array(
                'class' => 'LKERemarkBundle:Theme',
                'choice_label' => 'name'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LKE\RemarkBundle\Entity\Remark'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lke_remarkbundle_remark';
    }
}
