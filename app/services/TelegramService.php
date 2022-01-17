<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 17.01.2022
 * Time: 23:05
 */

namespace app\services;


use app\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use Psr\Http\Message\RequestFactoryInterface;
use Symfony\Component\HttpClient\Psr18Client;

class TelegramService implements NotificationServiceInterface
{

//    public function send(string $to, string $message): bool
//    {
//        $commands = [
//            '/whoami',
//            "/echo I'm a bot!",
//        ];
//
//        try {
//            $telegram = new Telegram(Config::get('tg_api_key'),Config::get('tg_bot_username'));
//            $telegram->runCommands($commands);
//        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
//            // Log telegram errors
//            Longman\TelegramBot\TelegramLog::error($e);
//
//            // Uncomment this to output any errors (ONLY FOR DEVELOPMENT!)
//            // echo $e;
//        } catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
//            // Uncomment this to output log initialisation errors (ONLY FOR DEVELOPMENT!)
//             echo $e;
//        }
//        return true;
//
//        Request::setCustomBotApiUri(
//            'https://api.telegram.org',
//            '/file/bot' . Config::get('tg_api_key')
//        );
//
//
//
//        return Request::sendMessage([
//            'chat_id' => $to,
//            'text'    => $message,
//        ]);
//
//    }

    public function send(string $to, string $message) : bool
    {


        $requestFactory = new \Nyholm\Psr7\Factory\Psr17Factory();
        $streamFactory = new HttpFactory();
        $client = new Client([
            'verify' => false,
            'defaults' => [
                'verify' => false
            ],
        ]);

        $apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
        $bot = new \TgBotApi\BotApiBase\BotApi(Config::get('tg_api_key'), $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer());

        $responce = $bot->send(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($to, $message));
        dd($responce);
        return true;
    }
}