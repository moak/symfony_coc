<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayerHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trophy',  'integer', array('label' => 'player.trophy'))
            ->add('troopSent',  'integer', array('label' => 'player.troopSent'))
            ->add('troopReceived',  'integer', array('label' => 'player.troopReceived'))
            ->add('attackWon',  'integer', array('label' => 'player.attackWon'))
            ->add('save', 'submit', array('label' => 'label.Save'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\PlayerHistory',
        ));
    }


    public function getName()
    {
        return 'player_history';
    }
}