<?php

use GithubStatus\Controller\GithubStatusController;
use GithubStatus\Router;

require_once dirname(__DIR__) . '/vendor/autoload.php';

define('VIEW_PATH', dirname(__DIR__) . '/views/');

$router = new Router();
$router->addRoute('GET', '/', function () {
    $controller = new GithubStatusController();
    return $controller->index();
});

$router->addRoute('GET', '/status', function () {
    $controller = new GithubStatusController();
    return $controller->get();
});

try {
    echo $router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch(\Throwable $e) {
    http_response_code(500);
    echo $e->getMessage();
}
