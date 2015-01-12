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