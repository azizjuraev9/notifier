<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:08
 */
namespace app\services;

interface NotificationServiceInterface
{

    public function send(string $to, string $message) : bool;

}