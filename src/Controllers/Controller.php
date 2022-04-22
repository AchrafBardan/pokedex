<?php

namespace Achrafbardan\Pokedex\Controllers;

use Achrafbardan\Pokedex\Library\UserManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class Controller
{
    public Environment $twig;

    public QueryBuilder $queryBuilder;

    public Request $request;

    public $connection;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__.'/../../views');

        $this->twig = new Environment($loader);

        $this->twig->addGlobal('currentUser', UserManager::currentUser());

        $conn = DriverManager::getConnection([
            'dbname' => 'pokedex',
            'user' => 'pokedex',
            'password' => 'pokepassword',
            'host' => 'mysql',
            'driver' => 'pdo_mysql',
        ]);

        $conn->connect();

        $this->connection = $conn;

        $this->request = Request::createFromGlobals();
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function queryBuilder()
    {
        return $this->connection->createQueryBuilder();
    }
}
