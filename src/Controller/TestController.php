<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/sleeping-endpoint', name: 'sleeping_endpoint')]
    public function sleepingEndpoint(): JsonResponse
    {
        sleep(5);

        return new JsonResponse(
            'response',
            Response::HTTP_OK,
        );
    }
}
