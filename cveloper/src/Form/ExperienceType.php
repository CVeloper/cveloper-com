<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', TextType::class, ['label' => 'Posicion'])
            ->add('company', TextType::class, ['label' => 'Compañía'])
            ->add('city', TextType::class, ['label' => 'Ciudad'])
            ->add('date_from', DateType::class, ['label' => 'Desde'])
            ->add('date_to', DateType::class, ['label' => 'Hasta'])
            ->add('id_developer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
