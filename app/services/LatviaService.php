<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:27
 */

namespace app\services;


use Symfony\Component\HttpClient\HttpClient;

class LatviaService implements FormCheckerServiceInterface
{

    public function IsOpen(): bool
    {
        $data = $this->fillForm();
        return false;
    }

    private function fillForm()
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            conf('latvia_url')
        );
        dd($response->getContent());
    }
}