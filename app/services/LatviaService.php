<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:27
 */

namespace app\services;


use app\Config;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\HttpClient\HttpClient;

class LatviaService implements FormCheckerServiceInterface
{

    private const STEP_1 = 'index';
    private const STEP_2 = 'step2';
    private const CALENDAR = 'available-month-dates';

    public function IsOpen(): bool
    {
        $data = $this->fillForm();
        return false;
    }

    private function fillForm() : void
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            Config::get('latvia_url') . self::STEP_1
        );

        $cookies = $response->getHeaders();
        $cookie = $this->prepareCookie($cookies['set-cookie']);
        $csrf = $this->step1($response->getContent(),$cookie);
        $this->step2($response->getContent(),$cookie);
        dd($this->getCalendar());
    }

    private function prepareCookie(array $cookie) : string
    {
        $p1 = explode('; ',$cookie[0])[0];
        $p2 = explode('; ',$cookie[1])[0];
        return $p2 . '; ' . $p1;
    }

    private function getS1FormData(string $doc) : array
    {
        $html = new \DOMDocument();
        $html->loadHTML($doc);
        $input = $html->getElementsByTagName('input');
        $id = $input->item(0)->attributes->getNamedItem('value')->textContent;
        $csrf = $input->item(1)->attributes->getNamedItem('value')->textContent;

        $user_data = Config::get('latvia_form_data');
        $index = rand(0,count($user_data) - 1);

        return array_merge([
            'branch_office_id' => $id,
            '_csrf-mfa-scheduler' => $csrf,
        ], $user_data[$index]);
    }

    private function step1(string $doc,string $cookie)
    {
        $client = HttpClient::create();
        $response = $client->request(
            'POST',
            Config::get('latvia_url') .self::STEP_1,
            [
                'body' => $this->getS1FormData($doc),
                'headers' => [
                    'Cookie' => $cookie
                ],
            ]
        );
        $html = new \DOMDocument();
        $html->loadHTML($response->getContent());
        $input = $html->getElementsByTagName('input');
        return $input->item(0)->attributes->getNamedItem('value')->textContent;
//        file_put_contents('result.html',$response->getContent());
//        dd($response->getContent());
    }

    private function step2(string $csrf,string $cookie)
    {
        $client = HttpClient::create();
        $response = $client->request(
            'POST',
            Config::get('latvia_url') .self::STEP_2,
            [
                'body' => [
                    '_csrf-mfa-scheduler' => $csrf,
                    'Persons[0][service_ids][]' => Config::get('latvia_visa_type'),
                    'visitor-agreement' => 1,
                ],
                'headers' => [
                    'Cookie' => $cookie
                ],
            ]
        );
        $html = new \DOMDocument();
        $html->loadHTML($response->getContent());
        $input = $html->getElementsByTagName('input');
        return $input->item(0)->attributes->getNamedItem('value')->textContent;
    }

    private function getCalendar(string $cookie) : array
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            Config::get('latvia_url') . self::CALENDAR . '?' . http_build_query([
                'year' => date('Y'),
                'month' => date('m'),
            ],[
                'headers' => [
                    'Cookie' => $cookie
                ],
            ])
        );
        return json_decode($response->getContent());
    }
}