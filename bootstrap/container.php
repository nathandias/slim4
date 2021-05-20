<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

$container = new Container();
AppFactory::setContainer($container);

$container->set('view', function() {
    return Twig::create('../views', ['cache'], false); 
});

$container->set('db', function() {
    return new PDO('sqlite:../db.sqlite3');
});

$container->set(HomeController::class, function($container) {
    return new HomeController(
        $container->get('view'),
    );
});

$container->set(UserController::class, function($container) {
    return new UserController (
        $container->get('view'),
        $container->get('db'),
    );
});