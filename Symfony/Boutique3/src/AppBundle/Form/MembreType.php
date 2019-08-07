<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


use Symfony\Component\Validator\Constraints as Assert;



class MembreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, array())
        ->add('nom', TextType::class, array())
        ->add('prenom', TextType::class, array())
        ->add('email', EmailType::class, array())
        ->add('civilite', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'm',
                'Femme' => 'f'
            ),
        ))
        ->add('codepostal', IntegerType::class, array())
        ->add('ville', TextType::class, array())
        ->add('adresse', TextareaType::class, array())
        ->add('password', PasswordType::class, array(
            'required' => false
        ))   
    
        ->add('inscription', SubmitType::class);

        if($options['statut'] == 'admin'){
            $builder
                ->add('roles');   
        }
        else {
            $builder
            ->add('password', PasswordType::class, array(
            'required' => false
            ));
        }


    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membre',
            'statut' =>'user'
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
