<?php
// src/Form/RegistrationFormType.php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'E-posta',
                'attr' => ['class' => 'form-control']
            ])
            ->add('username', TextType::class, [
                'label' => 'Kullanıcı Adı',
                'mapped' => true,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Lütfen bir kullanıcı adı girin',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Kullanıcı adınız en az {{ limit }} karakter olmalı.',
                        'max' => 50,
                        'maxMessage' => 'Kullanıcı adınız en fazla {{ limit }} karakter olmalı.',
                    ]),
                ],
            ])
            ->add('fullName', TextType::class, [
                'label' => 'Tam Ad (İsteğe Bağlı)',
                'mapped' => true,
                'required' => false,
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Tam adınız en fazla {{ limit }} karakter olmalı.',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Şartları Kabul Ediyorum',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Devam etmek için şartlarımızı kabul etmelisiniz.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Şifre',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Lütfen bir şifre girin',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Şifreniz en az {{ limit }} karakter olmalı',
                        'max' => 4096,
                    ]),
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
