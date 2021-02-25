<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;


class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('user_email', EmailType::class, [
            // Supprimer le required HTML5
            // Plus utile puisqu'on a le novalidate dans la vue
            'required' => false,
            'label' => 'Email',
            'constraints' => [
                // Non vide
                new NotBlank(),
                // Format E-mail valide
                new Email(),
            ]

        ])

        ->add('password', PasswordType::class, [
            // Supprimer le required HTML5
            'required' => false,
            'label' => 'Mot de passe',
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 8,
                    'max' => 16,
                ])
            ]
        ])


        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
