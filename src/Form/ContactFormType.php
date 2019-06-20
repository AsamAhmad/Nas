<?php


namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextAreaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends  AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
            'label' => false,
            'attr'  => [
                'placeholder' => 'Nom'
            ]
            ])

            ->add('lastname', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Prenom'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Email'
                ]
            ])

            ->add('compagny', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Societe'
                ]
            ])

            ->add('phone', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Telephone'
                ]
            ])

            ->add('message', TextAreaType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Message'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
    }

    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Contact::class);
    }
    

    /*
    public function getBlockPrefix()
    {
        return 'app_login';
    }
    */
}