<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cateLibelle', TextType::class, array(
                'label'=>'Libellé de la catégorie',
                'attr'=>array(
                    'placeholder'=>'ex : Technologie'
                )
            ))
            ->add('cateVideo', TextType::class, array(
                'label'=>'Lien de la catégorie',
                'attr'=>array(
                    'placeholder'=>'ex : https://www.youtube.com/embed/Sg06PnMpOy4'
                )
            ))
            ->add('cateSynthe', TextType::class, array(
                'label'=>'Couleur du synthé de la catégorie en rgb',
                'attr'=>array(
                    'placeholder'=>'ex : 255,255,255'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Categories'
        ));
    }
}

