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
            ->add('hall_town',  'choice', array('label' => 'player.hall_town', 'choices' => array('1'=> '1','2'=> '2','3'=> '3','4'=> '4','5'=> '5','6'=> '6','7'=> '7','8'=> '8','9'=> '9','10'=> '10', )))
            ->add('level',  'choice', array('label' => 'player.level', 'choices' => array( 0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100)))

            ->add('picture', new ImageType(), array('label' => 'form.my_picture', 'required' => false))
            ->add('base', new ImageType(), array('label' => 'form.my_base', 'required' => false))

            ->add('trophy',  'integer', array('label' => 'player.trophy'))
            ->add('troopSent',  'integer', array('label' => 'player.troopSent'))
            ->add('troopReceived',  'integer', array('label' => 'player.troopReceived'))
            ->add('attackWon',  'integer', array('label' => 'player.attackWon'))


            ->add('canon1' ,  'choice', array('label' => 'player.canon1',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))
            ->add('canon2' ,  'choice', array('label' => 'player.canon2',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))
            ->add('canon3' ,  'choice', array('label' => 'player.canon3',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))
            ->add('canon4' ,  'choice', array('label' => 'player.canon4',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))
            ->add('canon5' ,  'choice', array('label' => 'player.canon5',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))
            ->add('canon6' ,  'choice', array('label' => 'player.canon6',  'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12,13)))


            ->add('mortar1' , 'choice', array('label' => 'player.mortar1',  'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('mortar2' , 'choice', array('label' => 'player.mortar2', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('mortar3' , 'choice', array('label' => 'player.mortar3', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('mortar4' , 'choice', array('label' => 'player.mortar4', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))

            ->add('air_defence1' , 'choice', array('label' => 'player.air_defence1', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('air_defence2' , 'choice', array('label' => 'player.air_defence2', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('air_defence3' , 'choice', array('label' => 'player.air_defence3', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('air_defence4' , 'choice', array('label' => 'player.air_defence4', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))

            ->add('tower_magic1' , 'choice', array('label' => 'player.tower_magic1', 'choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('tower_magic2' , 'choice', array('label' => 'player.tower_magic2','choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('tower_magic3' , 'choice', array('label' => 'player.tower_magic3','choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))
            ->add('tower_magic4' , 'choice', array('label' => 'player.tower_magic4','choices' => array(0, 1, 2, 3, 4, 5, 6, 7, 8)))

            ->add('tower_archer1' , 'choice', array('label' => 'player.tower_archer1', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer2' ,  'choice', array('label' => 'player.tower_archer2', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer3' ,  'choice', array('label' => 'player.tower_archer3', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer4' ,  'choice', array('label' => 'player.tower_archer4', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer5' ,  'choice', array('label' => 'player.tower_archer5', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer6' ,  'choice', array('label' => 'player.tower_archer6', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))
            ->add('tower_archer7' ,  'choice', array('label' => 'player.tower_archer7', 'choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11 ,12 ,13)))

            ->add('king',  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)))
            ->add('queen',  'choice', array('choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40)))

            ->add('tesla1' , 'choice', array('label' => 'player.tesla1','choices' => array(0, 1, 2, 3, 4, 5,6,7,8)))
            ->add('tesla2' , 'choice', array('label' => 'player.tesla2','choices' => array(0, 1, 2, 3, 4, 5,6,7,8)))
            ->add('tesla3' , 'choice', array('label' => 'player.tesla3','choices' => array(0, 1, 2, 3, 4, 5,6,7,8)))
            ->add('tesla4' , 'choice', array('label' => 'player.tesla4','choices' => array(0, 1, 2, 3, 4, 5,6,7,8)))

            ->add('inferno1' , 'choice', array('label' => 'player.inferno_tower1','choices' => array(0, 1, 2, 3)))
            ->add('inferno2' , 'choice', array('label' => 'player.inferno_tower2','choices' => array(0, 1, 2, 3)))

            ->add('arcx1' , 'choice', array('label' => 'player.x_bow1','choices' => array(0, 1, 2, 3, 4)))
            ->add('arcx2' , 'choice', array('label' => 'player.x_bow2','choices' => array(0, 1, 2, 3, 4)))
            ->add('arcx3' , 'choice', array('label' => 'player.x_bow3','choices' => array(0, 1, 2, 3, 4)))

            ->add('barbar' , 'choice', array('label' => 'player.barbar','choices' => array(0, 1, 2, 3, 4,5, 6,7)))
            ->add('archer' , 'choice', array('label' => 'player.archer','choices' => array(0, 1, 2, 3, 4,5, 6,7)))
            ->add('geant' , 'choice', array('label' => 'player.geant','choices' => array(0, 1, 2, 3, 4,5, 6,7)))
            ->add('gobelin' , 'choice', array('label' => 'player.gobelin','choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('wall_breaker', 'choice', array('label' => 'player.wall_breaker','choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('ballon' , 'choice', array('label' => 'player.balloon','choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('wizard' , 'choice', array('label' => 'player.wizard','choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('healer' , 'choice', array('label' => 'player.healer','choices' => array(0, 1, 2, 3, 4)))
            ->add('dragon' , 'choice', array('label' => 'player.dragon','choices' => array(0, 1, 2, 3, 4)))
            ->add('pekka' ,  'choice', array('label' => 'player.pekka','choices' => array(0, 1, 2, 3, 4,5)))

            ->add('potion_damage' , 'choice', array('label' => 'player.potion_dmg','choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('potion_heal' , 'choice', array('label' => 'player.potion_heal','choices' => array(0, 1, 2, 3, 4, 5, 6, 7)))
            ->add('potion_green' , 'choice', array('label' => 'player.potion_green','choices' => array(0, 1, 2, 3)))
            ->add('potion_freeze' , 'choice', array('label' => 'player.potion_freeze','choices' => array(0, 1, 2, 3, 4, 5, 6)))
            ->add('potion_boost' , 'choice', array('label' => 'player.potion_boost','choices' => array(0, 1, 2, 3, 4, 5)))

            ->add('minion' ,  'choice', array('label' => 'player.minion','choices' => array(0, 1, 2, 3, 4,5, 6)))
            ->add('rider' ,  'choice', array('label' => 'player.rider','choices' => array(0, 1, 2, 3, 4,5)))
            ->add('valkyrie' ,  'choice', array('label' => 'player.valkyrie','choices' => array(0, 1, 2, 3, 4)))
            ->add('golem' ,  'choice', array('label' => 'player.golem','choices' => array(0, 1, 2, 3, 4,5)))
            ->add('witch' ,  'choice', array('label' => 'player.witch','choices' => array(0, 1, 2)))
            ->add('lava' ,  'choice', array('label' => 'player.lava','choices' => array(0, 1, 2, 3)))

           /* ->add('gold1' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold2' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold3' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold4' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold5' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold6' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('gold7' , 'choice', array('label' => 'player.gold','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))

            ->add('elixir1' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir2' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir3' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir4' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir5' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir6' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))
            ->add('elixir7' , 'choice', array('label' => 'player.elixir','choices' => array(0, 1, 2, 3, 4,5, 6, 7, 8, 9,10,11,12)))*/



            // ->add('utilisateurs', 'entity', array ('class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
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
        return 'players';
    }
}