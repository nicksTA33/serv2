<?php

namespace App\Controller;

use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RentController extends AbstractController
{
    #[Route('/', name: 'app_rent')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }
    
    #[Route('/requirements', name: 'app_requirements')]
    public function requirements(): Response
    {
        return $this->render('main/requirements.html.twig');
    }

    #[Route('/contacts', name: 'app_contacts')]
    public function contacts(): Response
    {
        return $this->render('main/contacts.html.twig');
    }

    #[Route('/available', name: 'app_available')]
    public function available(VehicleRepository $vehicleRepository): Response
    {
        $vehicles = $vehicleRepository->findAll();

        return $this->render('main/available.html.twig', [
            'vehicles' => $vehicles,
        ]);
    }
}
