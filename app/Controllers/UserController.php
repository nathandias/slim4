<?php

namespace App\Controllers;


use PDO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class UserController
{
    protected $view;

    protected $db;
    
    public function __construct(Twig $view, $db)
    {
        $this->view = $view;
        $this->db = $db;
    }

    public function show(Request $request, Response $response, array $args)
    {
        $query = $this->db->prepare("
            SELECT username, name, email
            FROM users
            WHERE username = :username
        ");

        $query->execute([
            'username' => $args['username']
        ]);

        if ($query->rowCount() === 0) {
            throw new HttpNotFoundException($request);
        }

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $this->view->render($response, 'users/show.twig', [
            'user' => $user,
        ]);
    }
    
}