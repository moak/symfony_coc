<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayerActualSeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('attackWon',  'integer', array('label' => 'player.attackWon'))
            ->add('troopSent',  'integer', array('label' => 'player.troopSent'))
            ->add('troopReceived',  'integer', array('label' => 'player.troopReceived'))
            ->add('save', 'submit', array('label' => 'label.update'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Player',
        ));
    }


    public function getName()
    {
        return 'player_actual_season';
    }
}