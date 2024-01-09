<?php

namespace App\Form;

use App\Entity\Bike;
use App\Entity\Size;
use App\Entity\Color;
use App\Entity\Image;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('referenceBike', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nameBike', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('descriptionBike', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('priceBike', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Category', EntityType::class, [
                
                'class' => Category::class,
                'choice_label' => 'nameCategory',
                'attr' => [
                    'class' => 'form-select'
                ]

            ])

            ->add('Image', EntityType::class, [
                
                'class' => Image::class,
                'choice_label' => 'frame',
                'attr' => [
                    'class' => 'form-select'
                ]

            ])
            ->add('Color', EntityType::class, [
                
                'class' => Color::class,
                'choice_label' => 'codeColor',
                'attr' => [
                    'class' => 'form-select'
                ]

            ])
            ->add('Size', EntityType::class, [
                
                'class' => Size::class,
                'choice_label' => 'valueSize',
                'attr' => [
                    'class' => 'form-select'
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
        ]);
    }
}
