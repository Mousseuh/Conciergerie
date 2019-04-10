<?php

namespace App\Form;

use App\Entity\Formule;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceFormuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', EntityType::class, [
                'class'        => Service::class,
                'choice_label' => 'name',
                'placeholder'  => 'Choisir un service',
            ])
            ->add('formule', EntityType::class, [
                'class'        => Formule::class,
                'choice_label' => 'name',
                'placeholder'  => 'Choisir une formule',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}