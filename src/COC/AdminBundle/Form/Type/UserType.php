<?php

namespace COC\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use COC\COCBundle\Entity\Clan;

class UserType extends AbstractType
{
    protected $clan;

    public function __construct (Clan $clan)
    {
        $this->clan = $clan;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player', 'entity',
                array ('class' => 'COCBundle:Player',
                    'property' => 'name',
                    'mapped'=>false,
                    'query_builder' => function(\COC\COCBundle\Repository\PlayerRepository $p) use ($options) {
                        return $p->getNotAssociedToUser($this->clan);
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