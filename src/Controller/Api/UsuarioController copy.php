<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // ✅ Correção 2
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Usuario;

#[Route('/api/v1', name: 'api_v1_usuario')]
class UsuarioController extends AbstractController // ✅ Correção 2
{
    #[Route('/lista', methods: ['GET'], name: 'lista')]
    public function lista(EntityManagerInterface $entityManager): JsonResponse // ✅ Correção 1
    {
        $doctrine = $entityManager->getRepository(Usuario::class); // ✅ Correção 1

        return new JsonResponse($doctrine->pegarTodos());
    }

    #[Route('/cadastra', methods: ['POST'], name: 'cadastra')]
    public function cadastra(): JsonResponse
    {
        return new JsonResponse(["implementar cadastro API"], 404);
    }
}
