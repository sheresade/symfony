<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.uYypfj1' shared service.

return $this->privates['.service_locator.uYypfj1'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'account' => ['privates', '.errored..service_locator.uYypfj1.App\\Entity\\Account', NULL, 'Cannot autowire service ".service_locator.uYypfj1": it references class "App\\Entity\\Account" but no such service exists.'],
], [
    'account' => 'App\\Entity\\Account',
]);
