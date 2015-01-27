<?php

namespace COC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ClanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null)
            ->add('description', null)

            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'COC\COCBundle\Entity\Clan' ));

    }


    public function getName()
    {
        return 'clan';
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