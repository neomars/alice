<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class EncodeUtf8Controller extends AbstractController
{
    public function encodeUtf8($nom_du_fichier) {
        // Vérifier si le fichier existe
        if (!file_exists($nom_du_fichier)) {
          throw new Exception("Le fichier '$nom_du_fichier' n'existe pas.");
        }
      
        // Déterminer l'encodage actuel du fichier
        $encodage_actuel = mb_detect_encoding(file_get_contents($nom_du_fichier));
      
        // Si le fichier est déjà en UTF-8, ne rien faire
        if ($encodage_actuel === 'UTF-8') {
          return;
        }
      
        // Lire le contenu du fichier
        $contenu = file_get_contents($nom_du_fichier);
      
        // Encoder le contenu en UTF-8
        $contenu_utf8 = mb_convert_encoding($contenu, 'UTF-8', $encodage_actuel);
      
        // Écrire le contenu encodé dans le fichier
        file_put_contents($nom_du_fichier, $contenu_utf8);
      }
}

?>