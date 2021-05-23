<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);

        $signedIn = false;
        
        if (!$signedIn) {
            return $response->withheader('Location', '/signin')
                ->withStatus(302);
        }
    
        return $response;
    }
}