<?php


namespace App\Form;


use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class MembreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', ChoiceType::class, [
                'choices'  => [
                    'Civilite'=> null,
                    'Melle' => 'Melle',
                    'Mme' => 'Mme',
                    'Mr' => 'Mr',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Prénom"
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Nom"
                ]
            ])
            ->add('company', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => "Votre société"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Entrez votre Email"
                ]
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe ne concordent pas.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => false, 'attr' => ['placeholder' => "Entrez votre mot de passe"]
                ],
                'second_options' => ['label' => false, 'attr' => ['placeholder' => 'Confirmez votre mot de passe']
                ],
            ])
            ->add('termsAccepted', CheckboxType:: class, [
                'mapped' => false,
                'label' => 'Accepter les conditions générales',
                'constraints' => new IsTrue(),
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => 'S\'inscrire'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Membre::class);
    }
}

