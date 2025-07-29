<?php

    namespace App\Controller;

    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    #[Route('/', name: 'web_usuario_')]
    class UsuarioController extends AbstractController
    {
        #[Route('/', methods:['GET'], name: 'index')]
        public function index(): Response
        {
            return $this->render("usuario/form.html.twig");
        }

        #[Route('/salvar', methods:['POST'], name: 'salvar')]
        public function salvar(): Response
        {
            return new Response("implementar gravação ao banco de dados");
        }
    }