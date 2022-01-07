<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:53
 */

namespace app\commands;


use Symfony\Component\DependencyInjection\Container;

class Commander
{

    private $commands;

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function run(string $command) : bool
    {
        if(!isset($this->commands[$command]))
        {
            throw new \ErrorException('No command: '.$command);
        }


        $command = $this->commands[$command];
        $command = new $command();
        return $command->run();
    }

}