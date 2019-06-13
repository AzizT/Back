<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Validator\Constraints as Assert;

class MembreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('codepostal', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                        'min' => 5,
                        'minMessage' => 'Le code postal doit comporter cinq chiffres',
                        'max' => 5,
                        'maxMessage' => 'Le code postal doit comporter cinq chiffres',
                )),
                new Assert\Regex(array(
                            'pattern' => '/^[0-9]{5,5}+$/',
                            'message' => 'Le code postal doit comporter cinq chiffres'
                        ))

            )
        ))
        ->add( 'username', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Votre pseudo doit comporter 3 caracteres minimum',
                    'max' => 20,
                    'maxMessage' => 'Votre pseudo doit comporter 20 caracteres maximum',
                )),
            )
        ))
        ->add( 'nom', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Votre nom doit comporter 3 caracteres minimum',
                    'max' => 20,
                    'maxMessage' => 'Votre nom doit comporter 20 caracteres maximum',
                )),
            )
        ))
        ->add( 'prenom', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Votre prenom doit comporter 3 caracteres minimum',
                    'max' => 20,
                    'maxMessage' => 'Votre prenom doit comporter 20 caracteres maximum',
                )),
            )
        ))
        ->add('email', EmailType::class)
        ->add( 'civilite', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'm',
                'Femme' => 'f',
            )
        ))
        ->add( 'ville', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'La ville doit comporter 3 caracteres minimum',
                    'max' => 20,
                    'maxMessage' => 'La ville doit comporter 20 caracteres maximum',
                )),
            )
        ))
        ->add( 'adresse', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 5,
                    'minMessage' => 'Votre adresse doit comporter 5 caracteres minimum',
                    'max' => 50,
                    'maxMessage' => 'Votre adresse doit comporter 50 caracteres maximum',
                )),
            )
        ))
        

        ->add('Enregistrer', SubmitType::class, array(
            'attr' => array(
                'class' => 'btn btn-warning'
            )
        ))
        ->add('inscription', SubmitType::class, array());

        if($options['statut'] == 'admin')
        {
            $builder
                ->add('roles');
        }
        else
        {
            $builder
            ->add('password', PasswordType::class, array(
                'required' => false,
            ));
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membre',
            'statut' => 'user'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_membre';
    }


}
