<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.jNqNE4H' shared service.

return $this->privates['.service_locator.jNqNE4H'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'account' => ['privates', '.errored..service_locator.jNqNE4H.App\\Entity\\Account', NULL, 'Cannot autowire service ".service_locator.jNqNE4H": it references class "App\\Entity\\Account" but no such service exists.'],
    'ts' => ['privates', 'App\\Service\\TransactionService', 'getTransactionServiceService.php', true],
], [
    'account' => 'App\\Entity\\Account',
    'ts' => 'App\\Service\\TransactionService',
]);
