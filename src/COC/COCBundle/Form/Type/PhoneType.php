<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Application\Sonata\UserBundle\Entity\User;
use COC\COCBundle\Entity\Clan;


class PhoneType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('phone', 'text')
            ->add('country', 'hidden', ['mapped' => false,])

            ->add('save', 'submit', array('label' => 'label.save'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\User',
        ));
    }


    public function getName()
    {
        return 'phone';
    }
}