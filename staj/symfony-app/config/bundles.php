<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    // Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true], // Bu satırı yorum satırı yaptık
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    // Aşağıdaki paketler de Symfony projenizde varsayılan olarak bulunabilir ve eğer kullanıyorsanız aktif olmalıdır:
    // Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true],
    // Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    // Symfony\UX\StimulusBundle\StimulusBundle::class => ['all' => true],
    // Symfony\UX\Turbo\TurboBundle::class => ['all' => true],
];
