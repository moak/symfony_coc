<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class RegistrationClanFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('phone', 'integer',  array('label' => 'label.phone', 'required'  => false,))

            ->add('clan', 'entity', array('label' => 'label.clan',
                    'class' => 'COCBundle:Clan',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->where('u.status = 0');
                    },)
            )


        /*
            ->add('clan', 'text', [
                'mapped' => false,
            ])*/
       ->add('clanName', 'text', array('label' => 'label.clanName', 'required'  => false,))
       ->add('pass', null, array('label' => 'label.password', 'required'  => false,))
            ->add('save', 'submit', array('label' => 'label.register'));
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