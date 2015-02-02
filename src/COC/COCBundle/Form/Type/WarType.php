<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class WarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', 'datetime')
            ->add('result', 'choice', array(
                'choices'   => array('0' => 'En attente de résultat', '2' => 'Victoire', '1' => 'Défaite'),
                'required'  => false,
            ))
            ->add('opponent' , null)
            ->add('image', new ImageType(), array('required'  => false,))
            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\War',
        ));
    }


    public function getName()
    {
        return 'wars';
    }
}