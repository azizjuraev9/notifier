<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:53
 */

namespace app\commands;


class Commander
{

    private $commands;
    private $config;

    public function __construct($commands,$config)
    {
        $this->commands = $commands;
        $this->config = $config;
    }

    public function run($command) : bool
    {
        if(!isset($this->commands[$command]))
        {
            exit(-1);
        }

        $command = $this->commands[$command];
        $command = new $command($this->config);
        return $command->run();
    }

}