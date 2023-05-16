<?php

namespace App\Entity;

use App\Repository\HealthQuizzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HealthQuizzRepository::class)]
class HealthQuizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $physicalActivity = null;

    #[ORM\Column(nullable: true)]
    private ?bool $goodEndurance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $goodMuscularStrength = null;

    #[ORM\Column(nullable: true)]
    private ?bool $goodFlexibility = null;

    #[ORM\Column(nullable: true)]
    private ?bool $lowLevelOfStress = null;

    #[ORM\Column(nullable: true)]
    private ?bool $goodSleepQuality = null;

    #[ORM\Column(nullable: true)]
    private ?bool $healthyRelationships = null;

    #[ORM\Column(nullable: true)]
    private ?bool $emotionalWellBeing = null;

    #[ORM\Column(nullable: true)]
    private ?bool $regularConsumptionOfFruitsAndVegetables = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adequateProteinIntake = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adequateFiberIntake = null;

    #[ORM\Column(nullable: true)]
    private ?bool $adequateHydratation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $nonSmoker = null;

    #[ORM\Column(nullable: true)]
    private ?bool $moderateOrNoAlcoholConsumption = null;

    #[ORM\Column(nullable: true)]
    private ?bool $goodStressManagement = null;

    #[ORM\Column(nullable: true)]
    private ?bool $sufficientAndQualitySleep = null;

    #[ORM\Column(nullable: true)]
    private ?bool $regularMedicalExaminations = null;

    #[ORM\Column(nullable: true)]
    private ?bool $UpToDateVaccinations = null;

    #[ORM\Column(nullable: true)]
    private ?bool $absenceOfUntreatedChronicHealthIssues = null;

    #[ORM\Column(nullable: true)]
    private ?bool $maintainingHealthyWeight = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPhysicalActivity(): ?bool
    {
        return $this->physicalActivity;
    }

    public function setPhysicalActivity(?bool $physicalActivity): self
    {
        $this->physicalActivity = $physicalActivity;

        return $this;
    }

    public function isGoodEndurance(): ?bool
    {
        return $this->goodEndurance;
    }

    public function setGoodEndurance(?bool $goodEndurance): self
    {
        $this->goodEndurance = $goodEndurance;

        return $this;
    }

    public function isGoodMuscularStrength(): ?bool
    {
        return $this->goodMuscularStrength;
    }

    public function setGoodMuscularStrength(?bool $goodMuscularStrength): self
    {
        $this->goodMuscularStrength = $goodMuscularStrength;

        return $this;
    }

    public function isGoodFlexibility(): ?bool
    {
        return $this->goodFlexibility;
    }

    public function setGoodFlexibility(?bool $goodFlexibility): self
    {
        $this->goodFlexibility = $goodFlexibility;

        return $this;
    }

    public function isLowLevelOfStress(): ?bool
    {
        return $this->lowLevelOfStress;
    }

    public function setLowLevelOfStress(?bool $lowLevelOfStress): self
    {
        $this->lowLevelOfStress = $lowLevelOfStress;

        return $this;
    }

    public function isGoodSleepQuality(): ?bool
    {
        return $this->goodSleepQuality;
    }

    public function setGoodSleepQuality(?bool $goodSleepQuality): self
    {
        $this->goodSleepQuality = $goodSleepQuality;

        return $this;
    }

    public function isHealthyRelationships(): ?bool
    {
        return $this->healthyRelationships;
    }

    public function setHealthyRelationships(?bool $healthyRelationships): self
    {
        $this->healthyRelationships = $healthyRelationships;

        return $this;
    }

    public function isEmotionalWellBeing(): ?bool
    {
        return $this->emotionalWellBeing;
    }

    public function setEmotionalWellBeing(?bool $emotionalWellBeing): self
    {
        $this->emotionalWellBeing = $emotionalWellBeing;

        return $this;
    }

    public function isRegularConsumptionOfFruitsAndVegetables(): ?bool
    {
        return $this->regularConsumptionOfFruitsAndVegetables;
    }

    public function setRegularConsumptionOfFruitsAndVegetables(?bool $regularConsumptionOfFruitsAndVegetables): self
    {
        $this->regularConsumptionOfFruitsAndVegetables = $regularConsumptionOfFruitsAndVegetables;

        return $this;
    }

    public function isAdequateProteinIntake(): ?bool
    {
        return $this->adequateProteinIntake;
    }

    public function setAdequateProteinIntake(?bool $adequateProteinIntake): self
    {
        $this->adequateProteinIntake = $adequateProteinIntake;

        return $this;
    }

    public function isAdequateFiberIntake(): ?bool
    {
        return $this->adequateFiberIntake;
    }

    public function setAdequateFiberIntake(?bool $adequateFiberIntake): self
    {
        $this->adequateFiberIntake = $adequateFiberIntake;

        return $this;
    }

    public function isAdequateHydratation(): ?bool
    {
        return $this->adequateHydratation;
    }

    public function setAdequateHydratation(?bool $adequateHydratation): self
    {
        $this->adequateHydratation = $adequateHydratation;

        return $this;
    }

    public function isNonSmoker(): ?bool
    {
        return $this->nonSmoker;
    }

    public function setNonSmoker(?bool $nonSmoker): self
    {
        $this->nonSmoker = $nonSmoker;

        return $this;
    }

    public function isModerateOrNoAlcoholConsumption(): ?bool
    {
        return $this->moderateOrNoAlcoholConsumption;
    }

    public function setModerateOrNoAlcoholConsumption(?bool $moderateOrNoAlcoholConsumption): self
    {
        $this->moderateOrNoAlcoholConsumption = $moderateOrNoAlcoholConsumption;

        return $this;
    }

    public function isGoodStressManagement(): ?bool
    {
        return $this->goodStressManagement;
    }

    public function setGoodStressManagement(?bool $goodStressManagement): self
    {
        $this->goodStressManagement = $goodStressManagement;

        return $this;
    }

    public function isSufficientAndQualitySleep(): ?bool
    {
        return $this->sufficientAndQualitySleep;
    }

    public function setSufficientAndQualitySleep(?bool $sufficientAndQualitySleep): self
    {
        $this->sufficientAndQualitySleep = $sufficientAndQualitySleep;

        return $this;
    }

    public function isRegularMedicalExaminations(): ?bool
    {
        return $this->regularMedicalExaminations;
    }

    public function setRegularMedicalExaminations(?bool $regularMedicalExaminations): self
    {
        $this->regularMedicalExaminations = $regularMedicalExaminations;

        return $this;
    }

    public function isUpToDateVaccinations(): ?bool
    {
        return $this->UpToDateVaccinations;
    }

    public function setUpToDateVaccinations(?bool $UpToDateVaccinations): self
    {
        $this->UpToDateVaccinations = $UpToDateVaccinations;

        return $this;
    }

    public function isAbsenceOfUntreatedChronicHealthIssues(): ?bool
    {
        return $this->absenceOfUntreatedChronicHealthIssues;
    }

    public function setAbsenceOfUntreatedChronicHealthIssues(?bool $absenceOfUntreatedChronicHealthIssues): self
    {
        $this->absenceOfUntreatedChronicHealthIssues = $absenceOfUntreatedChronicHealthIssues;

        return $this;
    }

    public function isMaintainingHealthyWeight(): ?bool
    {
        return $this->maintainingHealthyWeight;
    }

    public function setMaintainingHealthyWeight(?bool $maintainingHealthyWeight): self
    {
        $this->maintainingHealthyWeight = $maintainingHealthyWeight;

        return $this;
    }

    public function getHealthScore(): float
    {
    $rawScore = 
    ($this->physicalActivity ? 1 : 0) 
    + ($this->goodEndurance ? 1 : 0) 
    + ($this->goodMuscularStrength ? 1 : 0) 
    + ($this->goodFlexibility ? 1 : 0) 
    + ($this->lowLevelOfStress ? 1 : 0) 
    + ($this->goodSleepQuality ? 1 : 0)
    + ($this->healthyRelationships ? 1 : 0) 
    + ($this->emotionalWellBeing ? 1 : 0) 
    + ($this->regularConsumptionOfFruitsAndVegetables ? 1 : 0) 
    + ($this->adequateProteinIntake ? 1 : 0) 
    + ($this->adequateFiberIntake ? 1 : 0) 
    + ($this->adequateHydratation ? 1 : 0) 
    + ($this->nonSmoker ? 1 : 0) 
    + ($this->moderateOrNoAlcoholConsumption ? 1 : 0) 
    + ($this->goodStressManagement ? 1 : 0) 
    + ($this->sufficientAndQualitySleep ? 1 : 0) 
    + ($this->regularMedicalExaminations ? 1 : 0) 
    + ($this->UpToDateVaccinations ? 1 : 0) 
    + ($this->absenceOfUntreatedChronicHealthIssues ? 1 : 0) 
    + ($this->maintainingHealthyWeight ? 1 : 0);

    return ($rawScore / 20) * 100;
}

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
