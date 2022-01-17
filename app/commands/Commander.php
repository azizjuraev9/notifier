<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:53
 */

namespace app\commands;


use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class Commander
{

    private array $commands;
    private ContainerBuilder $container;

    public function __construct(array $commands, ContainerBuilder $container)
    {
        $this->commands = $commands;
        $this->container = $container;
    }

    public function run(string $command) : bool
    {
        if(!isset($this->commands[$command]))
        {
            throw new \ErrorException('No command: '.$command);
        }

//        dd($this->commands[$command]);
        $command = service($this->commands[$command]);
//        $command = $this->container->get($this->commands[$command]);
//        $command = new $command();
        return $command->run();
    }

}