<?php

namespace App\Form;

use App\Entity\Parametre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('periodeGratuite')
            ->add('prixReceptionDemande')
            ->add('prixValidationDemande')
            ->add('distanceMaxClientArtisan')
            ->add('prixUnCredit')
            ->add('prixAbonnement')
            ->add('prixReceptionDemandeAbonnement')
            ->add('prixValidationDemandeAbonnement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parametre::class,
        ]);
    }
}