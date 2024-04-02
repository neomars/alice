<?php
// src/Form/WhisperType.php
namespace App\Form;

use App\Entity\Whisper;
// use App\Entity\Terminal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
// use Vich\UploaderBundle\Form\Type\VichImageType;


class WhisperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
        $builder
            // ...
            ->add('audioFile', FileType::class, [
                'label' => "Fichier  à traiter (max ".ini_get('upload_max_filesize')."o)",

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Whisper details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        //'maxSize' => '500M',
                        'mimeTypes' => [
                            'audio/*',
                            'video/*',
                        ],
                        'mimeTypesMessage' => 'Envoyer seulement un fichier audio ou vidéo valide',
                    ])  
                ]
            ])
            ->add('locuteur', null, [
                'label' => 'Locuteur(s)',
                'required' => true,
                // 'help' => "Par defaut : 1",
                'choice_attr' => [
                    '0' => ['selected' => 'selected'],
                ],
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])
            ->add('task',null, [
                'label' => 'Tâche',
                'row_attr' => [
                    'class' => 'input-group',
                ],
                // 'help' => "Par defaut : transcription",               
            ])
            ->add('language',null,[
                'label' => 'Langue',
                // 'help' => "Par defaut : fr",
                'choice_attr' => [
                    '6' => ['selected' => 'selected'],
                ],
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])
            ->add('model',null,[
                'label' => 'Modèle neuronal',
                'choice_attr' => [
                    '9' => ['selected' => 'selected'],
                ],
                'row_attr' => [
                    'class' => 'input-group',
                ],
                // 'help' => "Par defaut : tiny",
            ])  
            ->add('highlightwords',null,[
                'label' => 'Mots en surbrillance',
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])
            // ->add('outputformat', null,[
            //     'label' => 'Format d\'exportation',
            //     'row_attr' => [
            //         'class' => 'input-group',
            //     ],
            //     'help' => "Par defaut : txt",
            // ])  
           
            ->add('prompt', TextareaType::class, [
                'label' => 'Prompt',
                'mapped' =>false,
                'required' => false,
                'help' => "\"Prompt\" est contitué de commandes facilitant l'interprétation.",
            ])  
            // terminal
            // ->add('model')
            // ->add('output_format')
            // ->add('language')
            // ->add('task')
        ;
    }
    
    // public function choice_attr($choice)
    // {
    //     return $choice['name'] === 'fr' ? ['selected' => 'selected'] : [];
    // }
    
    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => Whisper::class,
    //     ]);
    // }
}