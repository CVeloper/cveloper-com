<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// he tenido que añadir la ruta a este archivo para poder usarlo
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// cveloper/vendor/symfony/form/Extension/Core/Type/ChoiceType.php

// para incluir el checkbox de aceptar las condiciones y su validacion
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            // añado aqui una lista de las posibles opciones
            ->add('roles', ChoiceType::class, array(
              'choices' => array(
                  'Role User' => 'ROLE_USER',
                  'Role Admin' => 'ROLE_ADMIN'
                    )
                )
            )
            ->add('password')
            ->add('id_github')
            ->add('developer')
            ->add('termsAccepted', CheckboxType::class, [
                'mapped' => false,
                'constraints' => new IsTrue(),
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
