<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Resume;
use App\Form\ResumeType;
use Symfony\Component\Process\Process;


class ResumeController extends AbstractController
{
    /**
     * @Route("/resume/", name="app_resume")
     */
    public function index(Request $request): Response
    {
        $resume = new Resume();
        $form = $this->createForm(ResumeType::class, $resume);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            // Démarrage du chronomètre
            $avant = microtime(true);
            // echo "<pre>";
            // print_r($affiche_tableau = $request->request->all()); 
            // echo "</pre>";
            // echo $affiche_tableau['resume']['text'];
            // exit();
            
            $post_data = $request->request->all(); 
            (string)$url_text = $post_data['resume']['text'];
            // $prompt = $form->get('prompt')->getData();
            $content_text = file_get_contents($url_text);
            
        


        $commande_prompt = "[INST]".$post_data['resume']['prompt']."Uniquement en Français. Ne te répète pas.[/INST]";
        // Définir le texte à résumer
        $texte_full = $commande_prompt.$content_text;


        // Créer un process
        $process = new Process(
            [
                'sudo',
                'alpaca',
                '-c', $texte_full
            ]);

        // Exécuter le process
        $process->setTimeout(null);
        $process->setIdleTimeout(null);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Récupérer la sortie du process
        $resultat = $process->getOutput();

        //split de la chaine , la output double la réponse :()
        $resultat = str_split($resultat, strlen($resultat) / 2)[0];

        $this->addFlash('success','Votre document est traité. ');


        // Afficher la sortie
        // print_r($resultat);exit();
       

        // return $this->render('resume/status.html.twig', [
        //     'result' => $resultat,            
        // ]);
        
        }
        return $this->render('resume/resultat.html.twig', [
            'resume' => $resume,
            'form' => $form->createView(),
            'result' => $resultat, 
            'text' => $content_text
        ]);
    
    }
}
