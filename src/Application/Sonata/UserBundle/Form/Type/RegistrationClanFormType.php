<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationClanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('phone', 'integer',  array('required'  => false,))
            ->add('clan', 'entity', array ('class' => 'COC\COCBundle\Entity\Clan'))
        /*
            ->add('clan', 'text', [
                'mapped' => false,
            ])*/
       ->add('clanName', 'text', array('required'  => false,))
       ->add('pass', null, array('required'  => false,));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'clan_registration';
    }
}