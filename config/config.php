<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 06.01.2022
 * Time: 16:49
 */

use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

return [
    'tg_api_key' => $_ENV['TG_API_KEY'],
    'tg_bot_username' => $_ENV['TG_BOT_USERNAME'],
    'tg_chat_id' => $_ENV['TG_CHAT_ID'],
    'latvia_url' => $_ENV['LATVIA_URL'],
    'latvia_calendar_url' => $_ENV['LATVIA_CALENDAR_URL'],
    'latvia_visa_type' => 227, // Оформление латвийской национальной визы для граждан Узбекистана
//    'latvia_visa_type' => 440, // Виза для грузоперевозчиков
//    'latvia_visa_type' => 220, // Студенческая виза для граждан Республики Узбекистан
    'latvia_form_data' => [
        [
            'Persons[0][first_name]' => 'Maxmud',
            'Persons[0][last_name]' => 'Qoqonov',
            'e_mail' => 'Maxqoq@mail.ru',
            'phone' => '+998934447563',
        ],
        [
            'Persons[0][first_name]' => 'Oqil',
            'Persons[0][last_name]' => 'berdiev',
            'e_mail' => 'berdiev_o@gmail.com',
            'phone' => '+998946772323',
        ],
        [
            'Persons[0][first_name]' => 'Mutal',
            'Persons[0][last_name]' => 'Burxonov',
            'e_mail' => 'b.mutal@mail.ru',
            'phone' => '+998909978232',
        ],
    ],
];