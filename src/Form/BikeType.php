<?php

namespace App\Form;

use App\Entity\Bike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('referenceBike')
            ->add('nameBike')
            ->add('descriptionBike')
            ->add('priceBike')
            ->add('Category')
            ->add('Color')
            ->add('Size')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
        ]);
    }
}
