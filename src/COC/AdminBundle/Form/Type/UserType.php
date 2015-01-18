<?php

namespace COC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player', 'entity',
                array ('class' => 'COCBundle:Player',
                    'property' => 'name',
                    'mapped'=>false,
                    'query_builder' => function(\COC\COCBundle\Repository\PlayerRepository $p) {
                        return $p->getNotAssociedToUser();
                    }))
            ->add('save', 'submit', array('label' => 'Sauvegarder'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'COC\COCBundle\Entity\Player' ));

    }


    public function getName()
    {
        return 'player';
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