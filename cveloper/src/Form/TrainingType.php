<?php

namespace App\Form;

use App\Entity\Training;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('degree', TextType::class, ['label' => 'Grado'])
            ->add('institution', TextType::class, ['label' => 'Centro'])
            ->add('city', TextType::class, ['label' => 'Ciudad'])
            ->add('date_from', DateTimeType::class, ['label' => 'Desde'])
            ->add('date_to', DateTimeType::class, ['label' => 'Hasta'])
            //->add('id_developer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
