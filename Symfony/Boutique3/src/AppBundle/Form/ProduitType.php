<?php
// (crée via console, voir explication, création de formulaire)
// les add ci dessous entraine une modif dans le adminController en section ProduitAdd

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Validator\Constraints as Assert;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('reference', TextType::class, array(
                    'required' => false,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'message' => ' Attention, veuillez renseigner ce champs'
                        )),
                        new Assert\Length(array(
                            'min' => 3,
                            'minMessage' => 'Vous devez ecrire trois caracteres minimum',
                            'max' => 20,
                            'maxMessage' => 'Vous devez ecrire vingt caracteres maximum',
                        )),
                        new Assert\Regex(array(
                            'pattern' => '/^[a-zA-Z-_0-9]+$/',
                            'message' => 'Veuillez utiliser les lettres de A a Z et les chiffres de 0 a 9'
                        ))
                        
                    )
                ))
                ->add( 'categorie', TextType::class, array(
                    'required' => false,
                ))
                ->add( 'title', TextType::class, array(
                    'required' => false,
                ))
                ->add( 'description', TextareaType::class, array(
                    'required' => false,
                ))
                ->add( 'couleur', TextType::class, array(
                    'required' => false,
                ))
                ->add( 'taille', ChoiceType::class, array(
                    'choices' => array(
                        'XS' => 'xs',
                        'S' => 's',
                        'M' => 'm',
                        'L' => 'l',
                        'XL' => 'xl',
                        '2XL' => '2xl',
                    )
                ))
                ->add( 'public', ChoiceType::class, array(
                    'choices' => array(
                        'Homme' => 'm',
                        'Femme' => 'f',
                        'Homme et Femme ' => 'mixte',
                    )
                ))
                ->add( 'file', FileType:: class, array(
                    'required' => false,
                ))
                ->add( 'prix', MoneyType::class)
                ->add( 'stock', IntegerType::class, array(
                    'required' => false,
                    'constraints' => array(
                    new Assert\Type(array(
                        'type' => 'integer',
                        'message' => ' Veuillez renseigner avec des chiffres'
                    )),
                ),
                'attr' => array(
                    'placeholder' => 'Exemple : 125',
                    'class' => 'form-control',
                )
                ))
                ->add('Enregistrer', SubmitType::class, array(
                    'attr' => array(
                        'class' => 'btn btn-warning'
                    )
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_produit';
    }


}
