<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Setono\TagBagBundle\EventListener\RestoreTagBagSubscriber as DecoratedRestoreTagBagSubscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class RestoreTagBagSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private DecoratedRestoreTagBagSubscriber $restoreTagBagSubscriber
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 7],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $this->restoreTagBagSubscriber->onKernelRequest($event);
    }
}
