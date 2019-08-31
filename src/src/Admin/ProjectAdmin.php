<?php

namespace App\Admin;

use App\Entity\Image;
use App\Entity\Technology;
use App\Form\ImageType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ProjectAdmin extends AbstractAdmin
{
    /** @var array $datagridValues */
    protected $datagridValues = [
        '_sort_by' => 'position',
        '_sort_order' => 'ASC',
    ];

    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('name')
            ->add('link')
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                    'move' => [
                        'template' => '@PixSortableBehavior/Default/_sort.html.twig'
                    ]
                ]
            ])
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('move', $this->getRouterIdParameter() . '/move/{position}');
    }

    /**
     * {@inheritDoc}
     */
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('name')
            ->add('description')
            ->add('link', UrlType::class, [
                'required' => false
            ])
            ->add('technologies', EntityType::class, [
                'class' => Technology::class,
                'multiple' => true,
                'required' => false
            ])
            ->add('images', CollectionType::class, [
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_type' => ImageType::class,
                'delete_empty' => true
            ])
        ;
    }
}
