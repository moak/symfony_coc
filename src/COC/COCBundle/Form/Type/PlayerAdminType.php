<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayerAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null)
            ->add('hall_town', 'integer')
            ->add('level', 'integer')
            ->add('trophy', 'integer')

            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Player',
        ));
    }


    public function getName()
    {
        return 'players';
    }
}