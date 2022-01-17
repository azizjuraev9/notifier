<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 16.01.2022
 * Time: 3:00
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use app\commands\Commander;

return function(ContainerConfigurator $configurator) {
    // default configuration for services in *this* file
    $services = $configurator->services()
        ->defaults()
        ->autowire()      // Automatically injects dependencies in your services.
        ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

//    $services->set(Commander::class)->private();

    // makes classes in src/ available to be used as services
    // this creates a service per class whose id is the fully-qualified class name
    $services->load('app\\', '../app/*')
        ->exclude('../app/commands/Commander.php')
        ->public();
};