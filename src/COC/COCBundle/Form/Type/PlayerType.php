<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hall_town', 'integer', array ('required'  => false))
            ->add('troopReceived', 'integer', array ('required'  => false))
            ->add('troopSent', 'integer', array ('required'  => false))
            ->add('level', 'integer', array ('required'  => false))
            ->add('trophy', 'integer', array ('required'  => false))
            ->add('attackWon', 'integer', array ('required'  => false))

            ->add('canon1' , 'integer', array ('required'  => false))
            ->add('canon2' , 'integer', array ('required'  => false))
            ->add('canon3' , 'integer', array ('required'  => false))
            ->add('canon4' , 'integer', array ('required'  => false))
            ->add('canon5' , 'integer', array ('required'  => false))
            ->add('canon6' , 'integer', array ('required'  => false))

            ->add('mortar1' , 'integer', array ('required'  => false))
            ->add('mortar2' , 'integer', array ('required'  => false))
            ->add('mortar3' , 'integer', array ('required'  => false))
            ->add('mortar4' , 'integer', array ('required'  => false))


            ->add('tower_magic1' , 'integer', array ('required'  => false))
            ->add('tower_magic2' , 'integer', array ('required'  => false))
            ->add('tower_magic3' , 'integer', array ('required'  => false))
            ->add('tower_magic4' , 'integer', array ('required'  => false))

            ->add('tower_archer1' , 'integer', array ('required'  => false))
            ->add('tower_archer2' , 'integer', array ('required'  => false))
            ->add('tower_archer3' , 'integer', array ('required'  => false))
            ->add('tower_archer4' , 'integer', array ('required'  => false))
            ->add('tower_archer5' , 'integer', array ('required'  => false))
            ->add('tower_archer6' , 'integer', array ('required'  => false))

            ->add('tesla1' , 'integer', array ('required'  => false))
            ->add('tesla2' , 'integer', array ('required'  => false))
            ->add('tesla3' , 'integer', array ('required'  => false))

            ->add('barbar' , 'integer', array ('required'  => false))
            ->add('archer' , 'integer', array ('required'  => false))
            ->add('geant' , 'integer', array ('required'  => false))
            ->add('wall_breaker' , 'integer', array ('required'  => false))
            ->add('ballon' , 'integer', array ('required'  => false))
            ->add('wizard' , 'integer', array ('required'  => false))
            ->add('healer' , 'integer', array ('required'  => false))
            ->add('dragon' , 'integer', array ('required'  => false))
            ->add('pekka' , 'integer', array ('required'  => false))



            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Player',
        ));
    }


    public function getName()
    {
        return 'players';
    }
}