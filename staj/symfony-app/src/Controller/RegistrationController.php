<?php
// src/Controller/RegistrationController.php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Contracts\Translation\TranslatorInterface; // Bu satır kullanılmadığı için kaldırılabilir, tercihen bırakılabilir.

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // Kayıt sonrası flash mesajı ekle
            $this->addFlash('success', 'Kaydınız başarıyla tamamlandı! Giriş yapabilirsiniz.');
            return $this->redirectToRoute('app_login'); // Kayıt sonrası login sayfasına yönlendir
        }

        // Twig şablonunu render ederken site_title değişkenini gönder
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'site_title' => 'Dark Arts Atelier - Kayıt Ol', // <-- Bu satırı ekledim
        ]);
    }
}
