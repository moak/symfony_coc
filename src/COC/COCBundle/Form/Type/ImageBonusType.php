<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageBonusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null)
            ->add('image', new ImageType())
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\ImageBonus',
        ));
    }


    public function getName()
    {
        return 'imagesBonus';
    }
}