<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:46
 */
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$config = require "config/commands.php";
$commands = require "config/commands.php";

