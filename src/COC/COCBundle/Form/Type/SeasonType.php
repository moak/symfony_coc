<?php

namespace COC\COCBundle\Form\Type;

use COC\COCBundle\Entity\Clan;
use COC\COCBundle\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\EntityRepository;

class SeasonType extends AbstractType
{
    protected $season ;
    protected $actualSeason ;


    protected $clan;

    public function __construct (Clan $clan, Season  $actualSeason)
    {
        $this->clan = $clan;
        $this->actualSeason = $actualSeason;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $now = new \DateTime();
        $builder
            ->add('season', 'entity', array ('label' => 'label.previous_seasons','class' => 'COC\COCBundle\Entity\Season', 'property' => 'name', 'data' => 1, 'query_builder' => function(EntityRepository $er) use ($options) {
                return $er->createQueryBuilder('p')
                    ->where('p.start >= :createdAt')
                    ->andWhere('p.end <= :actualSeason')
                    ->orderBy('p.start', 'ASC')
                    ->setParameter('createdAt', $this->clan->getCreatedAt())
                    ->setParameter('actualSeason', $this->actualSeason->getStart())
                    ;
            }, ))
            ->add('save', 'submit', array('label' => 'label.search'));
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