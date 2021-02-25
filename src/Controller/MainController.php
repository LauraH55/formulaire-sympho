<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {   
        // 1. Directement dans le contrôleur
        // On créé un formulaire de login
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->add('pasword', PasswordType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        return $this->render('main/index.html.twig', [
            // On envoie au template "une vue de formulaire" via createView()
            'form' => $form->createView(),
        ]);
    }
}
