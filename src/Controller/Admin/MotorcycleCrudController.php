<?php

namespace App\Controller\Admin;

use App\Entity\AdminMotorcycle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MotorcycleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdminMotorcycle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('vin')->setRequired(true),
            TextField::new('plate'),
            TextField::new('color'),
            TextField::new('make'),
            TextField::new('model'),
            AssociationField::new('category', 'Категорія')->setRequired(false),
            NumberField::new('price'),
            TextField::new('image'),
        ];
    }
}
