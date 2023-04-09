<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Entrer votre nom',
                    'class' => 'form-control',
                    ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom de votre enfant',
                'attr' => [
                    'placeholder' => 'Entrer le prénom de votre enfant',
                    'class' => 'form-control',
                    ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre émail',
                'attr' => [
                    'placeholder' => 'Entrer votre adresse email',
                'class' => 'form-control',
                ],
            ])
            ->add('code', TextType::class, [
                'mapped' => false,
                'label' => 'Code d\'inscription',
                'attr' => [
                    'placeholder' => 'Entrer votre code d\'inscription',
                    'class' => 'form-control',
                    ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Veuillez accepter les conditions',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez accepter les conditions.',
                    ]),
                ],
            ])
            
            //TEST nouveau builder password------------------------------------------------


            //TEST nouveau builder password------------------------------------------------

            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                ],
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit avoir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'first_options'  => [
                    'label' => 'Votre mot de passe',
                    'attr' => [
                        'placeholder' => 'Entrer votre mot de passe',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confimer mot de passe',
                    'attr' => [
                        'placeholder' => 'Confirmer votre mot de passe',
                    ],
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
