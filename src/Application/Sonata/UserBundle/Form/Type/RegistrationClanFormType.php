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
        $builder->add('phone', 'integer',  array('required'  => false,))

            ->add('clan', 'entity', array(
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