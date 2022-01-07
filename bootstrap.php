<?php

use app\commands\CheckFormCommand;
use app\services\LatviaService;
use app\services\NotificationService;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 07.01.2022
 * Time: 13:18
 *
 * @var array $config
 * @var ContainerBuilder $container
 *
 */

function conf($key)
{
    if (isset($config[$key]))
    {
        return $config[$key];
    }
    throw new ErrorException('Config "' . $key . '" not found' );
}

function dd($data)
{
    var_dump($data);die;
}

$container->register('notificationService',NotificationService::class);
$container->register('formCheckerService',LatviaService::class);
$container->register('formCheckerService',CheckFormCommand::class);