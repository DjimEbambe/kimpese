<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required'=>true,
                'constraints'=>new Length([
                    'min'=>3,
                    'max'=>30
                ]),
            ])

            ->add('phone', TelType::class, [
                'required'=>true,
                'constraints'=>new Length([
                    'min'=>10,
                    'max'=>13
                ]),
            ])
            //->add('roles')
            ->add('password', RepeatedType::class, [
                'type'=> PasswordType::class,
                'invalid_message'=>'le mot de passe et la confirmation doivent etre identique',
                'label'=>'votre mot de passe',
                'constraints'=>new Length([
                    'min'=>4,
                    'max'=>12
                ]),
                'required'=>true,
                'first_options'=>[

                ],
                'second_options'=>[
                    'constraints'=>new Length([
                        'min'=>4,
                        'max'=>12
                    ]),
                ]
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
