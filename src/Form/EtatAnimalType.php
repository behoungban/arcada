<?php

namespace App\Form;

use App\Entity\EtatAnimal;
use App\Entity\Animal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FloatType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtatAnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etat', TextType::class, [
                'label' => 'État',
            ])
            ->add('nourriture', TextType::class, [
                'label' => 'Nourriture',
            ])
            ->add('grammage', FloatType::class, [
                'label' => 'Grammage',
            ])
            ->add('datePassage', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date de Passage',
            ])
            ->add('detailEtat', TextType::class, [
                'label' => 'Détail de l\'État',
                'required' => false,
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
            'data_class' => EtatAnimal::class,
        ]);
    }
}
