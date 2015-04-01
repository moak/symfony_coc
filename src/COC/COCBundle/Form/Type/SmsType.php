<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Application\Sonata\UserBundle\Entity\User;
use COC\COCBundle\Entity\Clan;


class SmsType extends AbstractType
{
    protected $clan;

    public function __construct (Clan $clan)
    {
        $this->clan = $clan;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', 'entity', array(  'multiple' => true,
                                            'mapped'  => false,
                                            'class' => 'Application\Sonata\UserBundle\Entity\User',
                                            'query_builder' => function(\Application\Sonata\UserBundle\Repository\UserRepository $p) use ($options) {
                                                return $p->getUsers($this->clan);
                                            }))


            ->add('msg', 'text')
            ->add('save', 'submit', array('label' => 'label.save'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Sms',
        ));
    }


    public function getName()
    {
        return 'sms';
    }
}