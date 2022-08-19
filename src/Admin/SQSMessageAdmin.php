<?php
namespace App\Admin;

use App\Entity\Task;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class SQSMessageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper) :void
    {
        $formMapper->add('body', TextareaType::class);
        $formMapper->add('recieved_at', DateTimeType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) :void
    {
        $datagridMapper->add('body');
        $datagridMapper->add('recieved_at');

    }

    protected function configureListFields(ListMapper $listMapper) :void
    {
        $listMapper->addIdentifier('body');
        $listMapper->addIdentifier('recieved_at');

    }
}