<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player', 'entity', array ('class' => 'COC\COCBundle\Entity\Player'))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Application\Sonata\UserBundle\Entity\User', 'player_id' => false ));

    }


    public function getName()
    {
        return 'users';
    }
}

           /* ->add('player', 'entity', array
            (
                'class' => 'COC\COCBundle\Entity\Player',
                'query_builder' => function(\Application\Sonata\UserBundle\Repository\UserRepository $repository)
                {
                    return $repository->getNonAssignedUsers();
                }
            ))
           */