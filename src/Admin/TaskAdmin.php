<?php
namespace App\Admin;

use App\Entity\Task;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class TaskAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper) :void
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('author', TextareaType::class);
        $formMapper->add('status', NumberType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) :void
    {
        $datagridMapper->add('title');
        $datagridMapper->add('author');
        $datagridMapper->add('status');

    }

    protected function configureListFields(ListMapper $listMapper) :void
    {
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('author');

    }
}