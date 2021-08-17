<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

    final class StockAdmin extends AbstractAdmin
    {
    protected function configureFormFields(FormMapper $formMapper): void
    {
    $formMapper
        ->add('name', TextType::class)
        ->add('phone', TextType::class)
        ->add('title', TextType::class)
        ->add('size', TextType::class)
        ->add('cond', TextType::class)
        ->add('felni', TextType::class)
        ->add('decor', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
    $datagridMapper
        ->add('name')
        ->add('title');
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
    $listMapper
        ->addIdentifier('name')
        ->add('phone', TextType::class)
        ->add('title', TextType::class)
        ->add('size', TextType::class)
        ->add('cond', TextType::class)
        ->add('felni', TextType::class)
        ->add('decor', TextType::class);
    }
    }