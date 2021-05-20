<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
//use Slim\Routing\RouteCollectorProxy;


$app->get('/', HomeController::class . ':index')->setName('home');

$app->get('/user/{username}', UserController::class . ':show')->setName('users.show');


// $app->get('/', function(Request $request, Response $response, array $args) {
//     return $this->get('view')->render($response, 'home.twig');
    
// })->setName('home');

// $app->get('/about', function(Request $request, Response $response, array $args) {
//     return $this->get('view')->render($response, 'about.twig');
// })->setName('about');

// $app->get('/contact', function(Request $request, Response $response, array $args) {
//     return $this->get('view')->render($response, 'contact.twig');
// })->setName('contact');


// $app->post('/contact', function(Request $request, Response $response, array $args) {
    
//     $data = $request->getParsedBody();
//     return $this->get('view')->render($response, 'contact.twig', ['name' => $data['name']]);
// });


// $app->group('/users/{username}', function (RouteCollectorProxy $group) {
    
//     $group->get('', function(Request $request, Response $response, $args) {
//         var_dump($args);
//         return $this->get('view')->render($response, 'profile.twig', [
//             'username' => $args['username']
//         ]);
//     });

//     $group->get('/posts/{id}', function(Request $request, Response $response, $args) {
//         var_dump($args);
//         return $this->get('view')->render($response, 'posts.twig', [
//             'username' => $args['username'],
//             'id' => $args['id'],
//         ]);
//     });
// });

// $app->get('/one', function(Request $request, Response $response, array $args) use ($app) {
//     return $response
//         ->withHeader('Location', $app->getRouteCollector()->getRouteParser()->urlFor('two'))
//         ->withStatus(302);
// })->setName('one');

// $app->get('/page/two', function(Request $request, Response $response, array $args) {
//     $response->getBody()->write('Two');
//     return $response;
// })->setName('two');

// $app->get('/json', function(Request $request, Response $response, array $args) {
//     $data = [
//         ['name' => 'Alex', 'email' => 'alex@codecourse.com'],
//         ['name' => 'Dale', 'email' => 'dale@codecourse.com'],
//     ];

//     $response->getBody()->write(json_encode($data));
    
//     return $response
//         ->withHeader('Content-Type', 'application/json');
// });