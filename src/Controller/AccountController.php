<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Form\UpdateUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AccountController extends AbstractController
{
    private $entityManager;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security){
        $this->entityManager=$entityManager;
        $this->security = $security;
    }
    /**
     * @Route("/compte", name="account")
     */
    public function index(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UpdateUserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user->setName($form->get('name')->getData());
            $user->setPhone($form->get('phone')->getData());
            $user->setFonction($form->get('fonction')->getData());
            //dd($user);
            $this->entityManager->flush();
        }

        return $this->render('account/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
