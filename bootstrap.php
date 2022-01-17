<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\Dotenv\Dotenv;

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

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$container = new ContainerBuilder();
$loader = new PhpFileLoader($container, new FileLocator(__DIR__));
$loader->load('config/services.php');
$container->compile();

function dd($data)
{
    var_dump($data);die;
}

function conf($key)
{
    if (isset($config[$key]))
    {
        return $config[$key];
    }
    throw new ErrorException('Config "' . $key . '" not found' );
}

