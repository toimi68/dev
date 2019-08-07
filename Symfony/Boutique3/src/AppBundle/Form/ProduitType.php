<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints as Assert;



class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc} // il herite de l'abstract
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('reference', TextType::class, array(
                 'required' => false,
                 'constraints' => array(
                     new Assert\NotBlank(array(
                     'message' => 'Attention, veuillez renseinger ce champs !'
                                         )),
                 
                 //Assert permet de paramétrer des contraintes
                 new Assert\Length(array(
                     'min' => 3,
                     'minMessage' => 'Attention veuillez renseinger min 3 caractères',
                     'max' => 20,
                     'maxMessage' => 'Attention veuillez renseinger max 20 caractères',
                                    )),
                                    new Assert\Regex(array(
                                        'pattern' => '/^[a-zA-Z-_0-9]+$/',
                                        //  'pattern' => '/^[A-Za-z0-9_-]{5,30}$/',
                                        'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9',
                                    )) 
                                            )
                ))


        ->add('categorie', TextType::class, array(
            'required' => false,
              ))
        ->add('titre', TextType::class,  array(
            'required' => false,
                                              ))
        ->add('description', TextareaType::class,  array(
            'required' => false,
                                                        ))
        ->add('couleur', TextType::class,  array(
            'required' => false,
                                                ))
        ->add('taille', ChoiceType::class, array(
            'choices' => array(
            'XS' => 'xs',
            'S' => 's',
            'M' => 'm',
            'L' => 'l',
            'XL' => 'xl',
            'XXL' => 'xxl'
                            )
        )) 
        
        // champs select, on l'apellera choise
        ->add('public', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'm',
                'Femme' => 'f',
                'Homme et Femme' => 'mixte'
            )
        ))

        ->add('file', FileType::class, array(
            'required' =>false
        ))



        ->add('prix', MoneyType::class)


        ->add('stock', IntegerType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\Type(array(
                    'type' => 'integer',
                    'message' => 'Veuillez renseigner un chiffre'
                ))
             
            ),
            'attr' =>array(
                'placeholder' =>'Ex: 125',
                'class' =>'form-control',
            )
                ))
        ->add('Enregistrer', SubmitType::class, array(
            'attr' => array(
                'class' =>'btn btn-warning'
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
