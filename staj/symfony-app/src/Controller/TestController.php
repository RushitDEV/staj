<?php
namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    private $passwordHasher;

    // PasswordHasher servisini constructor ile alıyoruz
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    #[Route('/create-user', name: 'app_create_user')]
    public function createUser(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setEmail('harunkaraca@gmail.com');
        $user->setRoles(['ROLE_USER']);

        // Parolayı hash'liyoruz
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'password123');
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('success', 'User created successfully!');

        return new Response('User created!');
    }
}
