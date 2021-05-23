<?php

namespace App\Middleware;

use App\Auth\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteParser;

class RedirectIfNotAuthenticated
{

    protected $routeParser;
    protected $auth;

    public function __construct(RouteParser $routeParser, Auth $auth)
    {
        $this->routeParser = $routeParser;
        $this->auth = $auth;
    }

    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        
        if (!$this->auth->check()) {
            return $response->withHeader('Location', $this->routeParser->urlFor('auth.signin'))
                ->withStatus(302);
        }
    
        return $response;
    }
}