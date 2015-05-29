<?php

namespace Acme\WakkoBundle\Eventlistener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use AppBundle\Twig\SourceCodeExtension;

class ControllerListener
{
    protected $twigExtension;

    public function __construct(SourceCodeExtension $twigExtension)
    {
        $this->twigExtension = $twigExtension;
    }

    public function registerCurrentController(FilterControllerEvent $event)
    {
        // this check is needed because in Symfony a request can perform any
        // number of sub-requests. See
        // http://symfony.com/doc/current/components/http_kernel/introduction.html#sub-requests
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->twigExtension->setController($event->getController());
        }
    }
}