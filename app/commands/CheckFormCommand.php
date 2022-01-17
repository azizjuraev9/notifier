<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 27.12.2021
 * Time: 0:44
 */

namespace app\commands;

use app\Config;
use app\services\FormCheckerServiceInterface;
use app\services\NotificationServiceInterface;

class CheckFormCommand implements CommandInterface
{

    private NotificationServiceInterface $notificationService;
    private FormCheckerServiceInterface $formCheckerService;

    public function __construct(
        NotificationServiceInterface $notificationService,
        FormCheckerServiceInterface $formCheckerService
    )
    {
        $this->notificationService = $notificationService;
        $this->formCheckerService = $formCheckerService;
    }

    public function run(array $args = []): bool
    {

        if($this->formCheckerService->IsOpen())
        {
            $this->notificationService->send(Config::get('to'),'');
        }
        return true;
    }
}