<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        ->add('codepostal', IntegerType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Length(array(
                        'min' => 3,
                        'minMessage' => 'Vous devez ecrire trois caracteres minimum',
                        'max' => 20,
                        'maxMessage' => 'Vous devez ecrire vingt caracteres maximum',
                ))

            )
        ))
        ->add( 'username', TextType::class, array(
            'required' => false,
        ))
        ->add( 'nom', TextType::class, array(
            'required' => false,
        ))
        ->add( 'prenom', TextType::class, array(
            'required' => false,
        ))
        ->add('email')
        ->add( 'civilite', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'm',
                'Femme' => 'f',
            )
        ))
        ->add( 'ville', TextType::class, array(
            'required' => false,
        ))
        ->add( 'adresse', TextType::class, array(
            'required' => false,
        ))
        ->add( 'statut', IntegerType::class, array(
            'required' => false,
        ))
        ->add('password')

        ->add('Enregistrer', SubmitType::class, array(
            'attr' => array(
                'class' => 'btn btn-warning'
            )
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membre'
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
