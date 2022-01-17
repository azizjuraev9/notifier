<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:46
 *
 * @var ContainerBuilder $container
 *
 */
require 'vendor/autoload.php';

use app\commands\Commander;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$config = require "config/config.php";
$commands = require "config/commands.php";
require 'bootstrap.php';

$commander = new Commander($commands,$container);
$commander->run($argv[1]);

