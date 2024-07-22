<?php

namespace App\Form;

use App\Entity\Nourriture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Animal;

class NourritureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Type de nourriture',
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Quantité',
            ])
            ->add('dateGiven', DateTimeType::class, [
                'label' => 'Date de distribution',
                'widget' => 'single_text',
            ])
            ->add('animal', EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'name',
                'label' => 'Animal',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nourriture::class,
        ]);
    }
}
