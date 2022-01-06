<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:27
 */

namespace app\services;


class LatviaService implements FormCheckerServiceInterface
{

    public function IsOpen(): bool
    {
        $data = $this->fillForm();
        return false;
    }

    private function fillForm()
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/repos/symfony/symfony-docs'
        );
    }
}