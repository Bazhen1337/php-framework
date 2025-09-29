<?php

    //root
    define('ROOT', dirname(__DIR__));

    const DEBUG = 0;
    const CONFIG = ROOT . '/config';
    const HELPERS = ROOT . '/helpers';
    const APP = ROOT . '/app';
    const CORE = ROOT . '/core';
    const VIEWS = APP . '/views';
    const ERROR_LOGS = ROOT . '/tmp/error.log';
    const LAYOUT = 'default';
    const COMPONENT = 'navigation';
    const PATH = 'http://localhost:8080/';

    //database
    const DB_SETTINGS = [
        'driver' => 'mysql',
        'host' => 'db',
        'database' => 'wow',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'port' => 3306,
        'prefix' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ],
    ];
