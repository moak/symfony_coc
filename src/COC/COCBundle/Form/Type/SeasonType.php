<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SeasonType extends AbstractType
{
    protected $season ;

    public function _construct($season){
        $this->season = $season ;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('season', 'entity', array ('class' => 'COC\COCBundle\Entity\Season', 'property' => 'name', 'data' => 1 ))
            ->add('save', 'submit', array('label' => 'Rechercher'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Season',
        ));
    }


    public function getName()
    {
        return 'season';
    }
}