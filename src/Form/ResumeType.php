<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prompt', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'data' => $options['data'],
                'required' => true,
                'help' => "Vous pouvez changer le nombre de ligne et/ou préciser votre demande.",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
            'data' => '', // Default data for the option
        ]);
    }
}
