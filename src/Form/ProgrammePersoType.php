<?php

namespace App\Form;

use App\Entity\Objectif;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProgrammePersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sport')
            ->add('objectif', ChoiceType::class, [
                "choices" => [
                    "Remise en forme" => true,
                    "Perte de poids" => true,
                ],
                "multiple" => true,
                'expanded' => true
            ])
            ->add ('dvpt', ChoiceType::class, [
                "choices" => [
                    "Force" => true,
                    "Vitesse" => true,
                    "Puissance" => true,
                    "Explosivité" => true,
                    "Capacité aérobie" => true,
                    "Répétiton d'efforts à haute intensité" => true
                ],
                "multiple" => true,
                'expanded' => true
            ])
            ->add('experience', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'ex: 2 heures par semaine'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
