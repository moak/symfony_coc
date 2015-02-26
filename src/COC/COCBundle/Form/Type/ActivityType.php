<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



class ActivityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('troopSent','integer', array('label' => 'player.troopSent', 'required' => false))
            ->add('troopReceived','integer', array('label' => 'player.troopReceived', 'required' => false))
            ->add('attackWon','integer', array('label' => 'player.attackWon', 'required' => false))
            ->add('trophy','integer', array('label' => 'player.trophy', 'required' => false))
            ->add('save', 'submit', array('label' => 'label.save'));

    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Player'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'activity_player';
    }
}