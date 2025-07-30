<?php

    namespace App\Controller;

    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use App\Entity\Usuario;
    use Doctrine\Persistence\ManagerRegistry;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\JsonResponse;

    #[Route('/', name: 'web_usuario_')]
    class UsuarioController extends AbstractController
    {
        #[Route('/', methods:['GET'], name: 'index')]
        public function index(): Response
        {
            return $this->render("usuario/form.html.twig");
        }

        #[Route('/salvar', methods:['POST'], name: 'salvar')]
        public function salvar(Request $request, EntityManagerInterface $entityManager): Response
        {

            $data = $request->request->all();

            $usuario = new Usuario();

            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);

            $entityManager->persist($usuario);
            $entityManager->flush();

            //$doctrine = $this->getDoctrine()->getManager();
            //$doctrine->persist($usuario);
            //$doctrine->flush();

            //if( $usuario->getId() )
            if( $doctrine->contains($usuario) )
            {
                return $this->render("usuario/sucesso.html.twig", [
                    "fulano" => $data['nome']
                ]);
            } else {
                return $this->render("usuario/erro.html.twig", [
                    "fulano" => $data['nome']
                ]);
            }

        }
    }