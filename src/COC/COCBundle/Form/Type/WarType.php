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
            ->add('start', null, array('label'=> 'label.start_date', 'widget' => 'single_text',))
            ->add('result', 'choice', array('label' => 'label.choose_result', 'choices' =>  array( '0' => 'label.waiting', '1' => 'label.defeat' ,'2' => 'label.victory'),))
            ->add('opponent' , null, array('label'=> 'label.opponent'))
            ->add('image', new ImageType(), array('required'  => false,))

            ->add('save', 'submit', array('label' => 'label.save'));
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