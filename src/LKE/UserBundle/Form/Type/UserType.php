<?php

namespace LKE\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("username", TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))

            ->add("email", EmailType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))

            ->add("plainPassword", TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LKE\UserBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return '';
    }
}
