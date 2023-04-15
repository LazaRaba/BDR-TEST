<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use \Symfony\Bundle\SecurityBundle\Security;


class DashboardController extends AbstractDashboardController
{

    // Inject the security service
    // public function __construct(private Security $security){}

    // #[Route('/admin', name: 'admin')]
    // public function index(): Response
    // {
    //     // Get the user object
    //     $user = $this->security->getUser();
    //     return $this->render('admin/dashboard.html.twig',[
    //         'user' => $user,
    //     ]);
    // }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MAM Brin de Rêves')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Menu', 'fa fa-home');
        yield MenuItem::linkToCrud('Mes enfants', 'fas fa-baby', User::class);
    }
}
