<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:46
 */
require 'vendor/autoload.php';


use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Dotenv\Dotenv;
use app\commands\Commander;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$config = require "config/config.php";
$commands = require "config/commands.php";

$container = new ContainerBuilder();
$loader = new PhpFileLoader($container, new FileLocator(__DIR__));
$loader->load('config/services.php');

$container->register('commander', Commander::class)->addArgument($commands)->addArgument($container);

$container->compile();
//$services->set(Commander::class, Commander::class)
//    ->args([param('mailer.transport')])

//var_dump($container->getServiceIds());die;

$commander = $container->get('commander');


require 'bootstrap.php';

//dd($container->has(\app\commands\CheckFormCommand::class));
dd($container->get(\app\commands\CheckFormCommand::class));
//dd(\Symfony\Component\DependencyInjection\Loader\Configurator\service(\app\commands\CheckFormCommand::class));

$commander->run($argv[1]);

