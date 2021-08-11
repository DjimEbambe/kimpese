<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class PatientType extends AbstractType
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
            ->add('middlemane', TextType::class, [
                'required'=>true,
                'constraints'=>new Length([
                    'min'=>3,
                    'max'=>30
                ]),
            ])
            ->add('diagnotic', TextareaType::class, [
                'required'=>true,
            ])
            ->add('traitement', TextareaType::class, [
                'required'=>true,
            ])
            ->add('observation', TextareaType::class, [
                'required'=>true,
            ])
            ->add('age', IntegerType::class, [
                'required'=>true,
                'constraints'=>new Length([
                    'min'=>1,
                    'max'=>2
                ]),
            ])
            ->add('sex', ChoiceType::class, [
                'required'=>true,
                'choices'  => [
                    'Femme' => 'F',
                    'Homme' => 'M',
                    'No' => '0',
                ],
            ])
            ->add('dateAdmin', DateType::class, [
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Moi', 'day' => 'Jour',
                ]
            ])
            ->add('lit')
            ->add('locale')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
