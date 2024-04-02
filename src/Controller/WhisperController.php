<?php

namespace App\Controller;

use App\Entity\Whisper;
use App\Entity\Log;
use App\Entity\Language;
use App\Entity\Outputformat;
use App\Entity\Highlightwords;
use App\Entity\Resume;
use App\Form\WhisperType;
use App\Form\ResumeType;
use App\Repository\ResumeRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FileUploader;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Controller\EncodeUtf8Controller;


class WhisperController extends AbstractController
{
    private $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    /**
     * @Route("/whisper/aide", name="app_whisper_aide")
     */
    public function aide(): Response
    {   
        return $this->render('whisper/aide.html.twig', [
            'controller_name' => 'WhisperController',
        ]);
    }
    

    /**
     * @Route("/whisper/status", name="app_whisper_status")
     */
    public function status(): Response
    {
        return $this->render('whisper/status.html.twig', [
            'controller_name' => 'WhisperController',
        ]);
    }

    /**
     * @Route("/", name="app_whisper_new")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $whisper = new Whisper();
        $form = $this->createForm(WhisperType::class, $whisper);
        $form->handleRequest($request);

        //chargement de la valeur du prompt pour resume
        // valeur par défaut de prompt resume
        $prompt_resume = $this->resumeRepository->findOneBy([]);
        $resume = new Resume();
        $form_resume = $this->createForm(ResumeType::class, $resume, [
            'data' => $prompt_resume, // Pass the data to the form
        ]);
        $form_resume->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Démarrage du chronomètre
            $avant = microtime(true);

            /** @var UploadedFile $audioFile */
            $audioFile = $form->get('audioFile')->getData();
            (string) $prompt = $form->get('prompt')->getData();
            if ($audioFile) {
                $audioName = $fileUploader->upload($audioFile);
                $whisper->setAudioName($audioName);
                
            }
            $path = 'uploads/files/'.$audioName;
            // Créez un objet File
            $file = new File($path);
            // Obtenir la taille du fichier
            $size = $file->getSize();
            $whisper->setAudioSize($size);
            // Obtenir l'extension du fichier
            $extension_audio = strtolower($file->guessExtension());
            $mimeType = mime_content_type($file->getPathname());
            //correction bug incompatibilité highlight et transalte
            if($whisper->getTask() == "translate")
             {
                $Highlightwords = "False";

             }
             else
             {
                $Highlightwords = $whisper->getHighlightwords();
             }


            //extension à null si non traitement de l'image
            $file_encode = null;
            
            /* enregistrement DB */
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($whisper);
            $entityManager->flush();

            //traitement des arguments
            if($whisper->getModel() == (Null || "")) {
                $modeldefault = 'large-v2';
            }
            else
            {
                $modeldefault = $whisper->getModel();
            }

            $pyannote_token = $this->getParameter('pyannote_token');

            //traitement du fichier
            $path = 'uploads/files/';
            if($whisper->getLanguage() != (Null || ""))
            {
                //utilisation de whisperx
                //whisperx fr_facile1-65d8769720391.mp3 --model large-v2 --diarize --highlight_words True --hf_token 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 --language fr --align_model WAV2VEC2_ASR_LARGE_LV60K_960H --batch_size 4
                //doc :: https://github.com/m-bain/whisperX/tree/main
                $process = new Process(
                    [
                    'sudo',
                    'whisperx', $path.$whisper->getAudioName(), 
                    '--diarize',
                    '--task', $whisper->getTask(), 
                    '--output_format', 'all', 
                    '--model', $modeldefault, 
                    '--output_dir', $path, 
                    '--language', $whisper->getLanguage(),
                    '--initial_prompt', '"'.$prompt.'"',
                    '--hf_token', $pyannote_token,
                    '--align_model', 'WAV2VEC2_ASR_LARGE_LV60K_960H', 
                    '--batch_size', '4',
                    '--min_speakers', $whisper->getLocuteur(),
                    '--max_speakers', $whisper->getLocuteur(),
                    '--highlight_words', $Highlightwords
                    ]);
                    
            }
            else
            {
                $process = new Process(
                    [
                    'sudo',
                    'whisperx', $path.$whisper->getAudioName(), 
                    '--diarize',
                    '--task', $whisper->getTask(), 
                    '--output_format', 'all', 
                    '--model', $modeldefault, 
                    '--output_dir', $path, 
                    '--initial_prompt', '"'.$prompt.'"',
                    '--hf_token', $pyannote_token,
                    '--align_model', 'WAV2VEC2_ASR_LARGE_LV60K_960H', 
                    '--batch_size', '4',
                    '--min_speakers', $whisper->getLocuteur(),
                    '--max_speakers', $whisper->getLocuteur(),
                    '--highlight_words', $Highlightwords
                    ]);
            }
            
            
            $process->setTimeout(null);
            $process->setIdleTimeout(null);
            
            $process->run();

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            else {
                // Exécution de la tâche
                //
              
                $generatefile = explode("-", $whisper->getAudioName());
                $generatekey = explode(".", $generatefile[1]);
                //liste des exetension de fichier
                $em = $this->getDoctrine()->getManager();
                $outputformats = $em->getRepository(Outputformat::class)->findAll();
                $extension_compteur = 0;
                foreach ($outputformats as $outputformat) {
                    $generatetext = '$generatetext_'.$outputformat->getName();
                    $$generatetext = $generatefile[0].'-'.$generatekey[0].'.'.$outputformat->getName();
                    //encodage des fichier en utf8
                    $encodeUtf8Controller = new EncodeUtf8Controller();
                    $encodeUtf8Controller->encodeUtf8($path.$$generatetext);
                    //passe en variable si .srt
                    if($outputformat->getName() == "vtt")
                        {
                            $content_file = file_get_contents($path.$$generatetext);
                            
                        }
                    //tableau des extentions
                    $generatetext_extension[$extension_compteur] = $$generatetext;
                    $extension_compteur++;
                }
            // echo "<pre>";
            // print_r($generatetext_extension); 
            // echo "</pre>";
            // exit();

                //transform to mp4
                //test mime  === video
                
                if($extension_audio != 'mp4'&& 
                $extension_audio != 'mov' &&
                $extension_audio != 'avi' &&
                $extension_audio != 'mpg' &&
                $extension_audio != 'mpa' &&
                $extension_audio != 'asf' &&
                $extension_audio != 'wma' &&
                $extension_audio != 'mp2' &&
                $extension_audio != 'm2p' &&
                $extension_audio != 'dif' &&
                $extension_audio != 'rare' &&
                $extension_audio != 'vob')
                {
                    $file_encode = ".mp4";
                    $process_mp4 = new Process(
                        [
                        'ffmpeg', 
                        '-f', 'lavfi',
                        '-i', 'color=c=black:s=800x300:r=5',
                        '-i', $path.$whisper->getAudioName(),
                        '-crf', '0',
                        '-c:a', 'copy',
                        '-shortest', $path.$whisper->getAudioName().'.mp4',
                        ]);
                    $process_mp4->setTimeout(null);
                    $process_mp4->run();
                }
                        
                $this->addFlash('success','Votre document audio est correctement transféré. ');
                $this->addFlash('success','Votre document audio a été traité. ');
                // return $this->redirectToRoute('app_whisper_status');

                 // Arrêt du chronomètre
                 $après = microtime(true);
                 // Calcul du temps d'exécution
                $tempsexecution = $après-$avant;
                $tempsexecution = round($tempsexecution,2)." secondes";

                //enregistrement du log
                $log = new Log();
                $log->setSize($size);
                $log->setExecutiontime((string)$tempsexecution);
                $log->setCommand(
                    'whisper '.$path.$whisper->getAudioName()
                    .'--diarize '
                    .' --task '.$whisper->getTask()
                    .' --output_format '.'all'
                    .' --model '.$modeldefault
                    .' --language '.$whisper->getLanguage()
                    .' --output_dir '.$path
                    .'--initial_prompt '."'".$prompt."'"
                    .'--align_model '.'WAV2VEC2_ASR_LARGE_LV60K_960H'
                    .'--batch_size '. '4'
                    .'--min_speakers '.$whisper->getLocuteur()
                    .'--max_speakers '.$whisper->getLocuteur()
                    .'--highlight_words '.$Highlightwords
                );
                $entityManagerLog = $this->getDoctrine()->getManager();
                $entityManagerLog->persist($log);
                $entityManagerLog->flush();

                //fin enregistrement du log

                return $this->render('resume/index.html.twig', [
                    'controller_name' => 'ResumeController',
                    'form' => $form_resume->createView(),
                    'prompt' => $prompt_resume,
                    'text' => $content_file,
                    'mp4' => $path.$whisper->getAudioName().$file_encode,
                    'language' => $whisper->getLanguage(),
                    // 'format'=> $whisper->getOutputformat(),
                    'name' => $whisper->getAudioName(),
                    'path' => $path,
                    'generatetext_extension' => $generatetext_extension,
                    
                ]);
                
            }
            
        }

        

        //effacement du fichier audio
        $process_clean_files = new Process(['find', 'uploads/files/', '-type', 'f', '-mmin', '+90', '-delete']); 
        $process_clean_files->run();
        
        return $this->render('whisper/new.html.twig', [
            'whisper' => $whisper,
            'form' => $form->createView(),
        ]);
    }
}
