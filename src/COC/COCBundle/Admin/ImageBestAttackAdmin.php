<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace COC\COCBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ImageBestAttackAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('gold', 'integer', array('label' => 'Gold'))
            ->add('elixir', 'integer', array('label' => 'Elixir'))



            // ->add('name', 'text', array('label' => 'Name title'))
            //  ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            //  ->add('body') //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('gold')
            ->add('elixir')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('gold')
            ->addIdentifier('elixir')
        ;
    }
}


