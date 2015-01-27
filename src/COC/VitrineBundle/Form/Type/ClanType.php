<?php

namespace COC\VitrineBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ClanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('attr' => array('placeholder' => 'Nom de compte',), 'label' => false,))
            ->add('name', 'text', array('attr' => array('placeholder' => 'Your name',), 'label' => false,))
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
        return 'clan';
    }
}