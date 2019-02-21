<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,[
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('phone', TextType::class,[
                'label' => 'Téléphone'
            ])
            ->add('email', EmailType::class,[
                'label' => 'Votre Email'
            ])
            ->add('objet', TextType::class,[
                'label' => 'Objet de votre message'
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Votre message',
                'attr' => ['rows' => 10 ]
            ])
            ->add('numDeRue',TextType::class,[
                'label' => 'Votre numéro de rue'
            ])
            ->add('rue',TextType::class,[
                'label' => 'Votre nom de rue'
            ])
            ->add('cp',TextType::class,[
                'label' => 'Votre code postal'
            ])
            ->add('ville',TextType::class,[
                'label' => 'Votre ville'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}