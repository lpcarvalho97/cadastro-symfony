<?php

    namespace App\Controller;

    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Response;


    #[Route('/', name: 'web_usuario_')]
    class UsuarioController
    {
        #[Route('/', methods:['GET'], name: 'index')]
        public function index(): Response
        {
            return new Response("implementar formulário de cadastro");
        }

        #[Route('/salvar', methods:['POST'], name: 'salvar')]
        public function salvar(): Response
        {
            return new Response("implementar gravação ao banco de dados");
        }
    }