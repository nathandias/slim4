<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require 'vendor/autoload.php';

$container = new Container();
AppFactory::setContainer($container);

$app = AppFactory::create();

$errorMiddleware = new ErrorMiddleware(
    $app->getCallableResolver(),
    $app->getResponseFactory(),
    true, false, false
);

$container->set('view', function() {
    return Twig::create('views', ['cache'], false); 
});
$app->add(TwigMiddleware::createFromContainer($app));


$container->set('hello', function() {
    return 'Hello';
});

$app->add($errorMiddleware);

$app->get('/', function(Request $request, Response $response, array $args) {
    
    $users = [
        'nathan',
        'rowland',
        'whoknows',
        'dad'
    ];
    
    return $this->get('view')->render($response, 'home.twig', compact('users'));

})->setName('home');

$app->get('/about', function(Request $request, Response $response, array $args) {
    return $this->get('view')->render($response, 'about.twig');
})->setName('about');

$app->get('/contact', function(Request $request, Response $response, array $args) {
    return $this->get('view')->render($response, 'contact.twig');
})->setName('contact');


$app->post('/contact', function(Request $request, Response $response, array $args) {
    
    $data = $request->getParsedBody();
    return $this->get('view')->render($response, 'contact.twig', ['name' => $data['name']]);
});


$app->run(); 

