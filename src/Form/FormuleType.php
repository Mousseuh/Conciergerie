<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\Formule;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr'  => ['autofocus' => true],
                'label' => 'Nom du service'
            ])
            ->add('description', TextareaType::class)
            ->add('services', EntityType::class, [
                'class'        => Service::class,
                'choice_label' => 'name',
                'multiple'     => true,
                'required'     => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formule::class,
        ]);
    }
}
