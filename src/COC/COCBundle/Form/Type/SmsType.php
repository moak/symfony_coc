<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', 'entity', array( 'multiple' => true, 'mapped'  => false, 'class' => 'Application\Sonata\UserBundle\Entity\User'))
            ->add('msg', 'text')
            ->add('save', 'submit', array('label' => 'label.save'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Sms',
        ));
    }


    public function getName()
    {
        return 'sms';
    }
}