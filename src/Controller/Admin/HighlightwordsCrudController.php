<?php

namespace App\Controller\Admin;

use App\Entity\Highlightwords;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HighlightwordsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Highlightwords::class;
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