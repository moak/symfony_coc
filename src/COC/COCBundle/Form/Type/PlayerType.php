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
            ->add('hall_town',  'choice', array('choices' => array( 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('troopReceived', 'integer', array ('required'  => false))
            ->add('troopSent', 'integer', array ('required'  => false))
            ->add('level',  'choice', array('choices' => array( 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100)))
            ->add('trophy', 'integer', array ('required'  => false))
            ->add('attackWon',  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100)))

            ->add('canon1' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('canon2' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('canon3' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('canon4' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('canon5' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('canon6' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))

            ->add('mortar1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('mortar2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('mortar3' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('mortar4' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))

            ->add('air_defence1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('air_defence2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('air_defence3' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('air_defence4' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))

            ->add('tower_magic1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('tower_magic2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('tower_magic3' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('tower_magic4' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))

            ->add('tower_archer1' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('tower_archer2' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('tower_archer3' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('tower_archer4' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('tower_archer5' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))
            ->add('tower_archer6' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10)))

            ->add('king',  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)))
            ->add('queen',  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)))

            ->add('tesla1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))
            ->add('tesla2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))
            ->add('tesla3' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))

            ->add('inferno1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))
            ->add('inferno2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))

            ->add('arcx1' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))
            ->add('arcx2' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))
            ->add('arcx3' , 'choice', array('choices' => array(0, 1, 2, 3, 4, 5)))

            ->add('barbar' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('archer' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('geant' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('wall_breaker', 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('ballon' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('wizard' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('healer' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('dragon' , 'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('pekka' ,  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6)))


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