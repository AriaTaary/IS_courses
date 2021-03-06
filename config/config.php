<?php

$database = (file_exists(__DIR__ . "/database_local.php")) ? require __DIR__ . "/database_local.php" : require __DIR__ . "/database.php";

return [
    /** Название проекта */
    'name' => 'ErrCode Base Project',

    /** Относительные ссылки на главную страницу и страницу авторизации */
    'homeUrl' => '/',
    'authUrl' => '/',

    'database' => $database,

    /** Названия файлов стилей из public_html/css/, которые нужно подключить */
    'styles' => [
        'fonts.css',
        'main.css'
    ],

    /** Названия скриптовых файлов из public_html/js/, которые нужно подключить */
    'scripts' => [

    ],

    /** Ссылка на favicon относительно public_html/ */
    'favicon' => '',

    'errors' => [
        404 => 'errors/404',
        'access' => 'errors/access'
    ],

    'DSA' => [
        "digest_alg" => "sha512",
        "private_key_bits" => 4096,
    ]
];