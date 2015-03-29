<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditWarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('result', 'choice', array(
                'choices'   => array( '0' => 'label.waiting', '2' => 'label.victory', '1' => 'label.defeat'),
                'required'  => false,
            ))
            ->add('opponent' , null, array('label'=> 'label.opponent'))
            ->add('image', new ImageType(), array('required'  => false,))
            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
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