<?php

namespace App\Form;

use App\Entity\OpeningHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpeningHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('openingMonday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Lundi ',
                'required' => false,
            ])
            ->add('closingMonday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingTuesday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Mardi ',
                'required' => false,
            ])
            ->add('closingTuesday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingWednesday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Mercredi ',
                'required' => false,
            ])
            ->add('closingWednesday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingThursday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Jeudi ',
                'required' => false,
            ])
            ->add('closingThursday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingFriday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Vendredi ',
                'required' => false,
            ])
            ->add('closingFriday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingSaturday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Samedi ',
                'required' => false,
            ])
            ->add('closingSaturday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ])
            ->add('openingSunday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Ouverture Dimanche ',
                'required' => false,
            ])
            ->add('closingSunday', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Jusqu\'à',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OpeningHours::class,
        ]);
    }
}
