<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.12.2021
 * Time: 0:43
 */

namespace app\commands;


interface CommandInterface
{

    public function run($args) : bool;

}