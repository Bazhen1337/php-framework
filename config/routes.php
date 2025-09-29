<?php

/** @var \Framework\Application $app */

$app->router->get('/register', [\App\Controllers\LoginController::class, 'register']);
$app->router->post('/register', [\App\Controllers\LoginController::class, 'store']);

//$app->router->get('test', [\App\Controllers\HomeController::class, 'test']);
//$app->router->post('/contact/', [\App\Controllers\ContactController::class, 'test']);

$app->router->get('/post/(?P<slug>[a-z0-9-]+)/?', function () {
    return '<p>Some post</p>';
});