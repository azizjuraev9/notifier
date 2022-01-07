<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:46
 */
require 'vendor/autoload.php';


use Symfony\Component\Dotenv\Dotenv;
use app\commands\Commander;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$config = require "config/commands.php";
$commands = require "config/commands.php";

$container = new ContainerBuilder();
$container->register('commander', Commander::class);

require 'bootstrap.php';

$commander = $container->get('commander');
$commander->run($argv[1]);

