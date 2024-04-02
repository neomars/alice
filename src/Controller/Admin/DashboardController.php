<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Log;
use App\Entity\User;
use App\Entity\Locuteur;
use App\Entity\Whisper;
use App\Entity\Task;
use App\Entity\Model;
use App\Entity\Outputformat;
use App\Entity\Language;
use App\Entity\Highlightwords;
use App\Entity\Resume;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
            $routeBuilder = $this->get(AdminUrlGenerator::class);

            return $this->redirect($routeBuilder->setController(LogCrudController::class)->generateUrl());
    
            // you can also redirect to different pages depending on the current user
            // if ('jane' === $this->getUser()->getUsername()) {
            //     return $this->redirect('...');
            // }
    
            // you can also render some template to display a proper Dashboard
            // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)

            // return $this->render('some/path/my-dashboard.html.twig');
            return parent::index;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Whisper');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Fichiers', 'fa fa-file', Whisper::class);
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Locuteur', 'fa fa-people-arrows', Locuteur::class);
        yield MenuItem::linkToCrud('Task', 'fa fa-check', Task::class);
        yield MenuItem::linkToCrud('Model', 'fa fa-road', Model::class);
        yield MenuItem::linkToCrud('Language', 'fa fa-language', Language::class);
        yield MenuItem::linkToCrud('Output Format', 'fa fa-font', Outputformat::class);
        yield MenuItem::linkToCrud('Highlight words', 'fa fa-highlighter', Highlightwords::class);
        yield MenuItem::linkToCrud('Prompt', 'fa fa-terminal', Resume::class);
        yield MenuItem::linkToCrud('Log', 'fa fa-toilet-paper', Log::class);
        yield MenuItem::linkToUrl('Exit', 'fa fa-door-open', '/');
    }
}
