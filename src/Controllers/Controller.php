<?php

namespace Achrafbardan\Pokedex\Controllers;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public Environment $twig;

    public QueryBuilder $queryBuilder;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__.'/../../views');

        $this->twig = new Environment($loader);

        $conn = DriverManager::getConnection([
            'dbname' => 'pokedex',
            'user' => 'pokedex',
            'password' => 'pokepassword',
            'host' => 'mysql',
            'driver' => 'pdo_mysql',
        ]);

        $conn->connect();

        $this->queryBuilder = $conn->createQueryBuilder();
    }
}
