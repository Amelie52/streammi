<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType; // ajout au cas où je veux mettre jour dans prog durée
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProgrammeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progUrl', TextType::class , array(
                'label'=>'Lien du programme',
                'attr' => array(
                    'placeholder' => 'ex : https://www.youtube.com/watch?v=nBtDsQ4fhXY',
                    'ng-model'=>'videourl'
                )
            ))
            ->add('progTitre', TextType::class , array(
                'label'=>'Titre du programme',
                'attr' => array(
                    'maxlength' => '50',
                    'placeholder'=>'Maximum 28 caracteres'
                )
            ))
            ->add('progDuree', TimeType::class, array(
                'view_timezone'=>'Europe/Paris',
                'label'=>'Durée du programme',
                'with_seconds'=>'true',
                'placeholder' => array(
                    'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde'
                )
            )) // modif de TimeType en DateTimeType si on veut jour
            ->add('progMinia', TextType::class , array('label'=>'Miniature du programme'))
            ->add('categorie')
            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Programme'
        ));
    }
}
