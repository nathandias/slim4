<?php

use App\Auth\Auth;
use Slim\Psr7\Response;
use Slim\Exception\HttpNotFoundException;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use App\Middleware\AuthMiddleware;

$errorMiddleware = new ErrorMiddleware(
    $app->getCallableResolver(),
    $app->getResponseFactory(),
    true, false, false
);

$errorMiddleware->setErrorHandler(HttpNotFoundException::class, function($request, $exception) use ($container) {
   $response = new Response();

   return $container->get('view')->render($response->withStatus(404), 'errors/404.twig');
});

$app->add($errorMiddleware);

$app->add(TwigMiddleware::createFromContainer($app));