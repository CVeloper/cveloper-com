<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// he tenido que añadir la ruta a este archivo para poder usarlo
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// cveloper/vendor/symfony/form/Extension/Core/Type/ChoiceType.php

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            // añado aqui la lista de las posibles opciones
            ->add('roles', ChoiceType::class, array(
                        'expanded' => true,
                        'multiple' => true,
                        'choices' => User::ROLE_TYPES
                    )
                )
            ->add('password')
            ->add('id_github')
            ->add('developer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
