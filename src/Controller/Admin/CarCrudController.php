<?php

namespace App\Controller\Admin;

use App\Entity\AdminCar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;


class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdminCar::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('vin')->setRequired(true),
            TextField::new('plate'),
            TextField::new('color'),
            TextField::new('make'),
            TextField::new('model'),
            NumberField::new('price'),
            TextField::new('image'),
        ];
    }
}
