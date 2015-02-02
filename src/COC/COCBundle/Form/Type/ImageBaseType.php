<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageBaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hall_town',  'choice', array('choices' => array(
                '' => 'Choisir hotel de ville',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
            ), ))
            ->add('image', new ImageType())
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\ImageBase',
        ));
    }


    public function getName()
    {
        return 'images_base';
    }
}