<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ClanHiringType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('privacy' , 'choice', array(
                'choices' => array( '0' => 'Site visible aux visiteurs', '1' => 'Site invisible aux visiteurs')
            ))

            ->add('status' , 'choice', array(
                'choices' => array( '0' => 'Clan visible', '1' => 'Clan invisible')
            ))
            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Clan',
        ));
    }


    public function getName()
    {
        return 'clan_password';
    }
}