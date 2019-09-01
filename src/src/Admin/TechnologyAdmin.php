<?php

namespace App\Admin;

use App\Entity\Image;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TechnologyAdmin extends AbstractAdmin
{
    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('name')
            ->add('image', 'image', [
                'width' => "30px"
            ])
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
            ->add('name')
        ;
    }
}
