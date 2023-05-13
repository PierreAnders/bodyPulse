<?php

namespace App\Form;

use App\Entity\HealthQuizz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HealthQuizzType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('physicalActivity')
            ->add('goodEndurance')
            ->add('goodMuscularStrength')
            ->add('goodFlexibility')
            ->add('lowLevelOfStress')
            ->add('goodSleepQuality')
            ->add('healthyRelationships')
            ->add('emotionalWellBeing')
            ->add('regularConsumptionOfFruitsAndVegetables')
            ->add('adequateProteinIntake')
            ->add('adequateFiberIntake')
            ->add('adequateHydratation')
            ->add('nonSmoker')
            ->add('moderateOrNoAlcoholConsumption')
            ->add('goodStressManagement')
            ->add('sufficientAndQualitySleep')
            ->add('regularMedicalExaminations')
            ->add('UpToDateVaccinations')
            ->add('absenceOfUntreatedChronicHealthIssues')
            ->add('maintainingHealthyWeight')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HealthQuizz::class,
        ]);
    }
}
