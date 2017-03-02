<?php

namespace CoreBundle\Form;

use CoreBundle\Entity\Emotion;
use CoreBundle\Entity\Remark;
use CoreBundle\Entity\Theme;
use CoreBundle\Form\Type\AbstractApiType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemarkType extends AbstractApiType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('context', TextareaType::class)
            ->add('sentence')
            ->add('theme', EntityType::class, [
                'class' => Theme::class,
            ])
            ->add('emotion', EntityType::class, [
                'class' => Emotion::class,
            ])
            ->add('scaleEmotion', IntegerType::class)
            ->add('email', EmailType::class, ['required' => false])
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
}
