<?php

namespace App\Controller;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;




class ResumetestController extends AbstractController
{
    /**
     * @Route("/resumetest/", name="app_resumetest")
     */
    public function resumetest(): array
    {
        // Définir le texte à résumer
        $texte = "
        [INST]Tu es un asitant dont la seulle mission est de réusmer du texte. Resume le texte suivant en Français :[/INST]
            En ce moment, l\'actualité militaire est absolument incroyable.
            Et celle de ces 48 dernières heures, la grosse information qu\'il ne fallait pas louper, elle se trouve en mer Rouge avec, pour la première fois depuis des décennies, l\'ouverture du feu par les Allemands.
            Ils ont ouvert le feu avec deux missiles SM2 de fabrication américaine, 2 millions de dollars pièce, avec leur frégate la F-124 à 750 millions d\'euros et ils ont
            loupé leur cible, et heureusement car il s\'agissait d\'un drone américain.
            Mais le plus incroyable dans tout ça, c\'est pas que l\'information est fuitée et soit disponible en source ouverte, c\'est que le lendemain les allemands ont vraiment eu à ouvrir le feu contre deux drones outils ce coup-ci, et qu\'ils n\'ont pas utilisé
            leurs missiles d\'interception que tout le monde utilise à l\'heure actuelle en mer rouge.
            Il y a eu 100 SM tirés, on en a parlé il y a quelques jours sur la chaîne.
            Ils ont utilisé leurs rames et leurs canons de 76, laissant penser à tout le monde que leur système de SM2 ne fonctionnait plus le lendemain et qu\'effectivement, ils avaient des problèmes beaucoup plus graves que ce qu\'on pourrait penser.
            Et tout cela n\'est pas sans nous faire penser
            A des soucis que nous avons eu dans la marine en 2018 lors de l\'opération Hamilton, ou que les britanniques ont encore rencontré il y a quelques semaines en testant un de leurs sous-marins nucléaires lanceurs d\'engin et son missile qui n\'a pas fonctionné.
            Allez, on revient sur tout ça juste après le G.
            La marine allemande sous son nom moderne existe depuis, eh bien, début 1956.
            Elle emploie 16 500 personnels, ce qui est très peu au vu de la taille du pays, 65 navires, 220 000 tonnes, et vous avez trois grandes catégories de frégates, les F-123,
            F-124, F-125.
            La F-123, ils en ont 4 opérationnelles à l\'heure actuelle.
            3600 tonnes et une capacité de défense aérienne assez intéressante avec 16 6x0 de fabrication américaine ou 64 Evolv 6x0.
            Ils peuvent en mettre en fait 4 par tube.
            En plus de ça, pour la protection rapprochée, ils ont des systèmes RAM, sur lesquels nous allons revenir après, qui sont des missiles d\'interception, dérivés si on peut dire du Sidewinder, pour une interception à moins de 10 km du navire.
            La F-124, ils en ont 3 à l\'heure actuelle, à la base ils en voulaient 4, c\'est la frégate qui nous intéresse aujourd\'hui, c\'est la fameuse classe Saxon, le navire qui nous intéresse pour être précis c\'est le Hessen,
            Fabriqué et lancé en 2001, sorti en 2006, 5800 tonnes, 143 mètres de long, 230 membres d\'équipage plus 13 personnes pour gérer les hélicoptères, une vitesse de pointe à 29 nœuds et un système réfléchi autour de radar.
            Le Smart L de Thales, qui vise à faire de la surveillance, contre lequel j\'ai dû m\'entraîner en tant que PA-2 Super et en arrêt de rafale.
            La part pour le guidage, et également sur certaines de ses frégates, l\'option d\'avoir un IRST, un senseur infrarouge, pour détecter les sources de chaleur à forte distance.
            En termes d\'armement, sur ces F124, vous allez avoir un canon de 76mm avec une bonne cadence de feu,
            Automélara, vous allez avoir deux 27 mm et là où c\'est intéressant, des VLS et vous avez 32 cellules de VLS.
            Ce qui vous permet de mettre 24 missiles SM-2 dont nous avons parlé récemment dans nos vidéos, des missiles américains, 2 millions de dollars pièce, interception à longue distance, moyenne distance, mais également 32 RIM-162 LEESM, 4 par silo qui vont vous permettre d\'intercepter à moyenne distance.
            Vous avez donc une forte capacité de défense avec quand même 66 missiles moyennes ou non portés.
            Et c\'est donc logique, lorsqu\'ils détectent un drone non identifié qu\'ils n\'aimaient pas.
            À l\'IFF, au transpondeur militaire, à l\'indicateur ami ou ennemi, ils se disent, est-ce que c\'est un avion de la coalition ?
            Ils regardent l\'ATO, l\'Air Task Order,
            se rendre compte qu\'il n\'y a aucun mouvement de l\'avion de la coalition dans la zone, coalition européenne, il regarde l\'air task order de la coalition américaine, rien de tout ça, du coup, bon chasseur, il tire, donc pas un missile, mais deux missiles contre un drone qui se déplace à basse vitesse, que les outils arrivent régulièrement à détruire, et il le manque.
            Ce qui est sorti dans la presse, c\'est que c\'était suite à un souci technique.
            Et ce qui nous fait penser que c\'est effectivement un gros souci technique, qui vient mettre hors d\'état de fonctionner les 24 SM2, plutôt les 22 qui restent s\'ils sont partis avec le plein, et les 32 E2SM.
            Et donc il y a peut-être un rapport avec le Smarthead ou la part, c\'est que le lendemain, ils ont annoncé avoir abattu deux drones.
            Un petit peu de décalage entre les deux tirs avec un engagement au 76mm qui engage quand vous défendez une frégate à 750 millions d\'euros avec 240 personnes à bord au 76mm, je ne sais pas.
            Et également au ram donc à moins de 10km.
            Ce qui fait absolument aucun sens tactique, et vous l\'aurez bien compris, si tout le monde ouvre le feu à longue ou moyenne distance contre les drones et les missiles-outils, c\'est justement pour préserver sa frégate.
            Et si vous êtes à devoir utiliser le couteau ou l\'arme de poing, c\'est que votre arme de sniper est sûrement hors service.
            Et là, ça fait tâche.
            Pourquoi ça fait tâche ?
            Parce que la F-124, c\'est quand même LA frégate anti-aérienne de la marine allemande.
            Pour des raisons budgétaires, déjà, ils n\'en ont que 3.
            Mais si vous regardez les F-125, les nouvelles, 7200 tonnes, les Allemands sont partis sur un postulat
            qu\'on va pas vraiment critiquer en tant que français, mais qui est plutôt pour de l\'anti-sol ou de l\'anti-piraterie, avec, pour un bijou à 760 millions d\'euros pièce, une Fredgat qui est seulement défendue par son système à rame, mais je vous rassure, ils ont prévu un canon à roue, c\'est pas une blague.
            Une incapacité à engager un missile à plus de 10 km, c\'est absolument aberrant, et surtout,
            en inadéquation totale avec la réalité de la guerre moderne.
            Le rime sans cesse, ce fameux RAM.
            Pourquoi RAM ?
            Rolling Airframe Missile.
            Parce qu\'en fait c\'est un missile qui tourne sur lui-même de manière à essayer de détecter l\'autodirecteur d\'un missile en approche.
            Et le fait de tourner, ça va lui permettre de faire un peu de trigonométrie, de détecter l\'autodirecteur par exemple d\'un missile Exocet qui en phase finale, comme on dit, passe pitbull.
            allume son autodirecteur, allume son petit radar embarqué, et le missile, le RAM, va le détecter et aller dessus.
            Il y a différentes versions qui existent, mais principalement c\'est du guidage IR ou passif, ce signal radar.
            Les Allemands, les Japonais, les Grecs, les Turcs, les Coréens du Sud, l\'Arabie Saoudite, les Égyptiens, le Mexique, les Émirats, et bien sûr les États-Unis, utilisent ce RIM-116, réfléchis pour faire de la défense de points, mais vraiment, c\'est votre revolver, combat rapproché.
            Le design remonte aux années 76, opérationnel début des années 90.
            Un système pèse 5,8 tonnes et tire des missiles de 74 kg qui ont quand même une charge militaire de 11,3 kg, ce qui est assez fort pour ce type de missile.
            Vitage supérieur à Mach 2 et interception source ouverte à 10 km.
            La probabilité d\'interception est vendue pour être supérieure à 95%.
            Il semblerait dans le cas des Allemands que c\'est bien fonctionné.
            Il a besoin pour fonctionner d\'être intégré à la conduite de tir du navire, sauf si c\'est le SeaRAM, auquel cas, il est couplé à un radar et l\'autodirecteur du système SeaWiz, le Phalanx, que vous connaissez bien sur la chaîne.
            Pour la petite histoire, l\'armée américaine a acheté 115 lanceurs pour équiper 74 navires et 1600 missiles.
            Vous retrouvez ces systèmes sur le Nimitz, sur le Ford, et sur notre porte-avions, on n\'a pas vraiment d\'équivalent, nous on a des missiles Aster.
            En termes d\'évolution, vous avez eu le Block 0 qui était vraiment une sorte de sidewinder qui se guidait sur l\'autodirecteur de l\'ennemi, le Block 1 qui avait en plus le guidage infrarouge, et ensuite vous avez la version Block 2 qui est vraiment partielle depuis 2018, qui est améliorée, et les allemands depuis 1998 ont travaillé sur le concept A.S.S.
            H.A.S.
            pour Hélicoptère, Aircraft et Surface, qui permet d\'utiliser ces missiles contre des hélicos, contre des avions, mais également contre des navires.
            Alors, le but ici n\'est pas de critiquer ou de tirer à boulies rouges ou à coups de torpille MU90 sur la marine allemande.
            c\'est de prendre un petit peu de recul et de se rendre compte du mur de la réalité et de l\'importance du fameux combat de Prouven.
            La marine française y a eu droit.
            C\'était lors de l\'opération Hamilton.
            Rappelez-vous, 13-14 avril 2018, nous envoyons nos toutes nouvelles frégates, les FREM, ces frégates multi-missions qui se distinguent à l\'heure actuelle en mer rouge.
            Vous aviez l\'Aquitaine qui devait tirer des MDCN, des missiles de croisière navale, et ça n\'a pas marché.
            Du coup, il y avait un backup, l\'Auvergne, qui devait tirer.
            Et ça n\'a pas marché.
            Et du coup c\'est le back-up du back-up, le Long Dock, qui a réussi à tirer 3 MDCN, 3 frégates déployées pour 3 missiles tirés.
            Vous vous doutez bien, surtout quand ça a fuité dans la presse quelques jours après, un peu à l\'image de cette histoire avec les Allemands.
            que ça a débriefé sévère dans les états-majors, mais la marine française en est sortie, grandit, et j\'espère que c\'est ce qui arrivera à l\'armée allemande.
            Autre cas, vous avez forcément entendu parler ces dernières semaines du HMS Vanguard, la dissuasion nucléaire repose sur des sous-marins à la mer prêts à tirer n\'importe quand, ce sont les fameux SNLE, les britanniques ont les leurs, ils doivent tirer du missile Trident, ils ont fait une démonstration au large de la Floride il y a quelques semaines, et le missile,
            n\'a pas fonctionné et a exposé, sans charge nucléaire je vous rassure, à quelques centaines de mètres du sous-marin tireur, et c\'est la deuxième fois de suite qu\'il n\'arrive pas à tirer, ce qui commence à décrédibiliser clairement la dissuasion nucléaire britannique.
            Alors, qu\'est-ce qu\'on peut en sortir de tout ça ?
            Comme vous le savez, moi depuis deux ans je suis absolument contre le fait de critiquer de manière manu militari un camp ou l\'autre,
            C\'est
            du volume et du volume RH également, car se faire toucher à un navire comme ça, ça peut faire très très mal.
            Toutes les nations du monde sont susceptibles d\'avoir ces soucis.
            Il faut regarder ce qui se passe chez les autres, capitaliser dessus, apprendre, anticiper et s\'assurer que ça ne vous arrive jamais au combat ou en situation de crise.
            Maintenant, un autre point très intéressant, c\'est que alors que cela arrive en mer, sa fuite, moins de 48 heures après, dans la presse.
            Et on en revient au brouillard de guerre.
            À un moment où en France on parle beaucoup de l\'importance de l\'ambiguïté stratégique, de ne pas dire exactement nos règles d\'engagement, à quel moment on décide de déclencher le feu nucléaire ou pas, on se rend compte qu\'il y a une énorme surcommunication qui provient de nos armées, de la presse spécialisée ou de conseillers qui pensent bien faire ou qui essayent de se faire mousser.
            Je vous rappelle que les bombardements au Levant
            ça avait fuité dans la presse et tout le monde a pu suivre en temps réel le déplacement des bombardiers américains.
            Là, une frégate allemande a des problèmes techniques, on est au courant le lendemain dans la presse, je pense que les outils sont ravis et vont essayer d\'en attaquer.
            D\'ailleurs, ils auraient touché des câbles sous-marins, on pourra en parler plus en détail si vous le souhaitez.
            Mais alors que nous sommes avec un narratif qui va de plus en plus vers une réindustrialisation, une remilitarisation de nos armées, on se rend compte que ce qui
            Faudrait changer en tout premier, c\'est la communication autour de la chose militaire.
            Vous allez me dire que je suis le contre-exemple, et bien moi en fait je ne suis plus militaire d\'active et je ne fais que réagir sur des sources
            Il y a quelques jours, le président Zelensky s\'étonnait et même se plaignait que les plans de sa contre-offensive étaient sur le bureau de Moscou avant même qu\'il lance sa contre-offensive.
            Si vous suivez un minimum l\'actualité, en fait vous pouvez suivre en temps réel ce qui se passe sur Twitter et il y a des gens au combat ou proches de la ligne de front qui postent ces vidéos, qui postent ces avancées, qui permettent à de nombreuses personnes de suivre en temps réel ce qui se passe.
            Peut-être qu\'il faudrait tout simplement re-réfléchir à notre manière de vouloir vivre.
            ou suivre les guerres en temps réel.
            Comme je vous le disais la dernière fois, le temps des arbres n\'est pas le temps de la communication, n\'est pas le temps de la géopolitique.
            Et le brouillard de guerre, parfois, aide grandement son armée.
            Vous avez beaucoup d\'informations sur ce qui se passe actuellement sur la bande de Gaza.
            Vous voyez bien que quand un état veut contrôler l\'information, il y a quand même des moyens de le faire.
            C\'est tout simplement une question de cohérence.
            Allez.
            Auf Wiedersehen !
            Nous sommes en 1955, Herr Brammer, on peut avoir une deuxième chance ?
            Deutsche Qualität.
        ";

        // Créer une commande
        //$commande = sprintf('python monscript.py', $texte);

        // Définir les options du process
        // $options = [
        //     'timeout' => 60, // Définir un délai d'expiration (en secondes)
        //     'cwd' => '/path/to/script/directory', // Définir le répertoire de travail du process
        // ];

        // Créer un process
        $process = new Process(
            [
                'sudo',
                'alpaca',
                '-c', $texte
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

        // Afficher la sortie
        print_r($resultat);


    }
}