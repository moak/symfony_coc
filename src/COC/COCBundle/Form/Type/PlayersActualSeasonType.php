<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayersActualSeasonType extends AbstractType
{

    public function __construct($players)
    {

        $this->players = $players;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ($this->players as $player)
        {
            $builder
                ->add('attackWon',  'integer', array('label' => 'player.attackWon'))
                ->add('save', 'submit', array('label' => 'label.update'));
        }



    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }


    public function getName()
    {
        return 'player_actual_season';
    }
}