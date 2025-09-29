<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Автозагрузчик классов
//spl_autoload_register(function($class) {
//    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//    if (file_exists($file)) {
//        require $file;
//    }
//});

// Подключение ядра
//require_once 'core/Router.php';
//require_once 'app/controllers/Controller.php';
//require_once 'app/models/Model.php';
require_once 'config/config.php';
require_once HELPERS . '/helpers.php';
require_once 'vendor/autoload.php';

$whoops = new \Whoops\Run();
if (DEBUG) {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
} else {
    $whoops->pushHandler(new \Whoops\Handler\CallbackHandler(function (Throwable $e) {
        error_log("[" . date('Y-m-d H:i:s') . "] Error: {$e->getMessage()}" . PHP_EOL . "File: {$e->getFile()}" . PHP_EOL . "Line: {$e->getLine()}" . PHP_EOL . '================' . PHP_EOL, 3, ERROR_LOGS);
        abort('Some error', 500);
    }));
}
$whoops->register();

$app = new \Framework\Application();
require_once CONFIG . '/routes.php';
$app->run();
// Маршруты
//$router = new Router();
//
//// Добавляем маршруты
//$router->add('', ['controller' => 'Login', 'action' => 'index']);
//$router->add('login', ['controller' => 'Login', 'action' => 'login']);
//$router->add('test', function() {
//    echo "Test route works!";
//    exit;
//});
//$router->add('{controller}/{action}');
//$router->add('{controller}/{id:\d+}/{action}');
//
//// Запуск маршрутизатора
//$router->dispatch($_SERVER['QUERY_STRING']);