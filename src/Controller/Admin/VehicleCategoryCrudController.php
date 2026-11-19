<?php

namespace App\Controller\Admin;

use App\Entity\VehicleCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VehicleCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleCategory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Назва категорії')->setRequired(true),
        ];
    }
}
