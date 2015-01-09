<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace COC\COCBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PlayerAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null)
            ->add('hall_town', 'integer')
            ->add('troopReceived', 'integer')
            ->add('troopSent', 'integer')
            ->add('level', 'integer')
            ->add('trophy', 'integer')
            ->add('attackWon', 'integer')
            ->add('user', 'entity', array ('class' => 'Application\Sonata\UserBundle\Entity\User'))

            // ->add('name', 'text', array('label' => 'Name title'))
            //  ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            //  ->add('body') //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')

        ;
    }
}


