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
            ->add('name', null)
            ->add('hall_town', 'integer')
            ->add('troopReceived', 'integer')
            ->add('troopSent', 'integer')
            ->add('level', 'integer')
            ->add('trophy', 'integer')
            ->add('attackWon', 'integer')

            ->add('canon1' , 'integer')
            ->add('canon2' , 'integer')
            ->add('canon3' , 'integer')
            ->add('canon4' , 'integer')
            ->add('canon5' , 'integer')
            ->add('canon6' , 'integer')

            ->add('mortar1' , 'integer')
            ->add('mortar2' , 'integer')
            ->add('mortar3' , 'integer')
            ->add('mortar4' , 'integer')


            ->add('tower_magic1' , 'integer')
            ->add('tower_magic2' , 'integer')
            ->add('tower_magic3' , 'integer')
            ->add('tower_magic4' , 'integer')

            ->add('tower_archer1' , 'integer')
            ->add('tower_archer2' , 'integer')
            ->add('tower_archer3' , 'integer')
            ->add('tower_archer4' , 'integer')
            ->add('tower_archer5' , 'integer')
            ->add('tower_archer6' , 'integer')

            ->add('tesla1' , 'integer')
            ->add('tesla2' , 'integer')
            ->add('tesla3' , 'integer')

            ->add('barbar' , 'integer')
            ->add('archer' , 'integer')
            ->add('geant' , 'integer')
            ->add('wall_breaker' , 'integer')
            ->add('ballon' , 'integer')
            ->add('wizard' , 'integer')
            ->add('healer' , 'integer')
            ->add('dragon' , 'integer')
            ->add('pekka' , 'integer')



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