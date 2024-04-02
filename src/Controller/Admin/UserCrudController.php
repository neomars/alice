<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            TextField::new('password'),
            BooleanField::new('isVerified'),
            ChoiceField::new('roles', "roles")
            ->setChoices(['Administrateur' => 'ROLE_ADMIN', 'Utilisateur' => 'ROLE_USER'])
            ->allowMultipleChoices(true)
        ];
    }
    
}
