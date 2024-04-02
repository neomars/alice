<?php

namespace App\Controller\Admin;

use App\Entity\Whisper;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class WhisperCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Whisper::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        // ...
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ->remove(Crud::PAGE_INDEX, Action::EDIT)
        ;
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
