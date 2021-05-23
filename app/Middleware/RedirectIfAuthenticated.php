<?php

namespace App\Middleware;

use App\Auth\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class RedirectIfAuthenticated
{

    protected $auth;

    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }


    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        
        $signedIn = false;

        if ($this->auth->check()) {
            return $response->withHeader('Location', '/')
                ->withStatus(302);
        }
    
        return $response;
    }
}