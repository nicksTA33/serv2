<?php

namespace App\Controller;

use App\Repository\VehicleRepository;
use App\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    ////added
    #[Route('/available/{id}', name: 'app_available_show', methods: ['GET'])]
    public function show(string $id, VehicleRepository $vehicleRepository): Response
    {
        $vehicle = $vehicleRepository->find($id);

        if (!$vehicle) {
            throw $this->createNotFoundException('Транспортний засіб не знайдено.');
        }

        return $this->render('main/show.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

    #[Route('/api/vehicles', name: 'api_vehicles_list', methods: ['GET'])]
    public function list(VehicleRepository $vehicleRepository): JsonResponse
    {
        $vehicles = $vehicleRepository->findAll();

        $data = array_map(static function ($vehicle): array {
            return [
                'id' => $vehicle->getId(),
                'make' => $vehicle->getMake(),
                'model' => $vehicle->getModel(),
                'price' => $vehicle->getPrice(),
                'image' => $vehicle->getImage(),
                'category' => $vehicle->getCategory()
            ];
        }, $vehicles);

        return $this->json([
            'count' => count($data),
            'items' => $data,
        ]);
    }
}
