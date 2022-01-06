<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 17:00
 */

namespace app\commands;


abstract class Command implements CommandInterface
{

    protected array $config;

    public function init(array $config) : void
    {
        $this->config = $config;
    }

}