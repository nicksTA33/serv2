<?php

namespace App\Controller\Admin;

use App\Entity\AdminCar;
use App\Entity\AdminMotorcycle;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        return $this->redirectToRoute('admin_car_index');
       
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         //return $this->redirectToRoute('admin');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Carrent');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Головна', 'fa fa-home');
        
        yield MenuItem::section('Автопарк');
        
        yield MenuItem::linkTo(CarCrudController::class, 'Автомобілі', 'fas fa-car');
        yield MenuItem::linkTo(MotorcycleCrudController::class, 'Мотоцикли', 'fas fa-motorcycle');
        yield MenuItem::linkTo(VehicleCategoryCrudController::class, 'Категорії', 'fas fa-tags');

    }
}
