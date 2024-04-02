<?php

namespace App\Controller\Admin;

use App\Entity\Locuteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LocuteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Locuteur::class;
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
}