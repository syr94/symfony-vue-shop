<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\UserResolver;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private UserResolver $userResolver;
    private FormFactoryInterface $formFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserResolver $userResolver,
        FormFactoryInterface $formFactory
    )
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/show', name: 'user_show')]
    public function show(Request $request)
    {

    }

    #[Route('/user/create', name: "create_user")]
    public function create(Request $request)
    {
        try {


           /* $user = $this->userResolver->getCurrentUser();

            $form = $this->formFactory->createNamed('user', UserType::class, $user);
            $form->submit($request->request->get('user'), false);

            if ($form->isValid()) {
                $this->entityManager->flush();

                return ['user' => $user];
            }*/

        } finally {
            return $this->redirect("/user");
        }
        /*     $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $this->addFlash('notice', "Created Successfully!!");
            }
            return $this->render('user/create.html.twig',[
                'form' => $form->createView()
            ]);*/
    }
}
