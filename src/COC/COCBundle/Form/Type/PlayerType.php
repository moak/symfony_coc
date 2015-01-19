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


            ->add('tower_magic1' , 'integer', array ('required'  => false ))
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

            ->add('barbar' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('archer' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('geant' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('wall_breaker', 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('ballon' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('wizard' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('healer' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            ->add('dragon' , 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))
            //->add('pekka' , 'integer', array ('required'  => false))

            ->add('pekka', 'choice', array('choices' => array(1, 2, 3, 4,5, 6)))

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