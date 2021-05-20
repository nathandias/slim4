<?php


use Slim\Middleware\ErrorMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$errorMiddleware = new ErrorMiddleware(
    $app->getCallableResolver(),
    $app->getResponseFactory(),
    true, false, false
);

$app->add($errorMiddleware);

$app->add(TwigMiddleware::createFromContainer($app));

