<?php

namespace App\Form;

use App\Entity\Developer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class DeveloperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name', TextType::class, ['label' => 'Nombre'])
            ->add('last_name' , TextType::class, ['label' => 'Apellidos'])
            ->add('address', TextType::class, ['label' => 'Dirección'])
            ->add('postal_code', NumberType::class, ['label' => 'Código Postal'])
            ->add('city', TextType::class, ['label' => 'Ciudad'])
            ->add('phone', NumberType::class, ['label' => 'Teléfono'])
            ->add('github', TextType::class, ['label' => 'Github'])
            ->add('linkedin', TextType::class, ['label' => 'Linkedin'])
            ->add('web', TextType::class, ['label' => 'Web'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            //->add('avatar')
            //->add('id_user')
            //->add('devTeches')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Developer::class,
        ]);
    }
}
