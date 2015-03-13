<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ClanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('country',  'choice', array('label' => 'clan.country', 'choices' => array('none' => 'country.none', 'in' => 'country.in','eu' => 'country.eu','na' => 'country.na', 'ns' => 'country.ns', 'aus' => 'country.aus', 'a' => 'country.a',)))
            ->add('level',  'choice', array('label' => 'clan.level', 'choices' => array( 1 => 1, 2=>2, 3=>3, 4=>4,5=>5, 6=>6, 7=>7, 8=>8, 9=>9,10=>10)))
            ->add('image', new ImageType(), array('label' => 'clan.image_upload', 'required' => false))

            ->add('privacy' , 'choice', array('label' => 'label.site_visibility'
            ,                'choices' => array( '0' => 'label.site_visible', '1' => 'label.site_invisible')
            ))

            ->add('password' , null , array('label' => 'label.password'))
            ->add('status' , 'choice', array('label' => 'label.clan_registration',
                'choices' => array( '0' => 'label.clan_visible', '1' => 'label.clan_invisible')
            ))
            ->add('message' , 'textarea',  array('label' => 'clan.message'))
            ->add('capacity',  'choice', array('label' => 'clan.capacity', 'choices' => array( 0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)))
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
        return 'clan';
    }
}