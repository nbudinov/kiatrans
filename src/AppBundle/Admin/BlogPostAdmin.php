<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->end()

            ->with('Meta data' , array('class' => 'col-md-3'))
                ->add('category', 'sonata_type_model', array(
                    'class' => 'AppBundle\Entity\Category',
                    'property' => 'name',
            ))
            ->end();

//        $formMapper->add('title', 'text')
//            ->add('body', 'textarea')
//            ->add('category', 'sonata_type_model', array(
//                'class' => 'AppBundle\Entity\Category',
//                'property' => 'name',
//            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title')
            ->add('body')
            ->add('draft')
            ->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            ));

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
        ->addIdentifier('body')
        ->addIdentifier('draft')
            ->addIdentifier('category.name');
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

}