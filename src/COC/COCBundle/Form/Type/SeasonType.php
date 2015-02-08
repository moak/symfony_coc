<?php

namespace COC\COCBundle\Form\Type;

use COC\COCBundle\Entity\Clan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityRepository;

class SeasonType extends AbstractType
{
    protected $season ;


    protected $clan;

    public function __construct (Clan $clan)
    {
        $this->clan = $clan;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime();
        $builder
            ->add('season', 'entity', array ('class' => 'COC\COCBundle\Entity\Season', 'property' => 'name', 'data' => 1, 'query_builder' => function(EntityRepository $er) use ($options) {
                return $er->createQueryBuilder('p')
                    ->where('p.start >= :createdAt')
                    ->orderBy('p.start', 'ASC')
                    ->setParameter('createdAt', $this->clan->getCreatedAt())
                    ;
            }, ))
            ->add('save', 'submit', array('label' => 'Rechercher'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\Season',
        ));
    }


    public function getName()
    {
        return 'season';
    }
}