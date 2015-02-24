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

            ->add('privacy' , 'choice', array('label' => 'label.clan_registration'
,                'choices' => array( '0' => 'label.site_visible', '1' => 'label.site_invisible')
            ))

            ->add('status' , 'choice', array('label' => 'label.site_visibility',
                'choices' => array( '0' => 'label.clan_visible', '1' => 'label.clan_visible')
            ))
            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('save', 'submit', array('label' => 'label.save'));
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