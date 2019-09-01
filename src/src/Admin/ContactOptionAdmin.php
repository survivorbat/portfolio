<?php

namespace App\Admin;

use App\Entity\Image;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContactOptionAdmin extends AbstractAdmin
{
    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('label')
            ->add('value')
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('label')
            ->add('value')
        ;
    }
}
