<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 07.01.2022
 * Time: 18:47
 */

namespace app\services;


class NotificationService implements NotificationServiceInterface
{

    public function send(string $to, string $message): bool
    {
        return false;
    }
}