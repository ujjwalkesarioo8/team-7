<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name')->hideOnForm(),
            TextEditorField::new('description'),
            BooleanField::new('status'),
            DateTimeField::new('created_at')->setLabel('entry date'),
        
        ];
    }
    
   /*public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityPermission('ROLE_USER');

    }*/
    
    
}
