<?php
// src/EventListener/LocaleListener.php

namespace App\EventListener; // Bu namespace doğru olmalı

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class LocaleListener
{
    private string $defaultLocale;

    public function __construct(string $defaultLocale = 'tr')
    {
        $this->defaultLocale = $defaultLocale;
    }

    #[AsEventListener(event: KernelEvents::REQUEST, priority: 10)] // method parametresi kaldırıldı
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // Eğer bir alt istekse (örneğin Symfony'nin bir controller'dan başka bir controller'a yönlendirmesi),
        // dil işleme yapma. Bu, sonsuz döngüyü veya yanlış dil ayarlarını önler.
        if (!$event->isMainRequest()) {
            return;
        }

        // Rotadan bir _locale parametresi zaten ayarlanmışsa kullan
        if ($request->attributes->has('_locale')) {
            $request->getSession()->set('_locale', $request->attributes->get('_locale'));
            $request->setLocale($request->attributes->get('_locale')); // Request'in locale'ini de ayarla
            return;
        }

        // Oturumda bir dil varsa kullan
        if ($request->getSession()->has('_locale')) {
            $request->setLocale($request->getSession()->get('_locale'));
            return;
        }

        // Tarayıcının tercih ettiği dil varsa kullan (desteklediğiniz diller listesinden)
        // Desteklediğiniz tüm dilleri burada belirtin.
        $preferredLanguage = $request->getPreferredLanguage(['en', 'tr']);
        if ($preferredLanguage) {
            $request->setLocale($preferredLanguage);
            $request->getSession()->set('_locale', $preferredLanguage);
            return;
        }

        // Hiçbiri yoksa varsayılan dili kullan
        $request->setLocale($this->defaultLocale);
        $request->getSession()->set('_locale', $this->defaultLocale);
    }
}
