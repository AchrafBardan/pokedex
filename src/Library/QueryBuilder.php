<?php

namespace Achrafbardan\Pokedex\Library;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder as QueryQueryBuilder;

class QueryBuilder 
{
    public static function connection(): Connection
    {   
        $conn = DriverManager::getConnection([
            'dbname' => 'pokedex',
            'user' => 'pokedex',
            'password' => 'pokepassword',
            'host' => 'mysql',
            'driver' => 'pdo_mysql',
        ]);

        $conn->connect();

        return $conn;
    }

    public static function make(): QueryQueryBuilder
    {
        return self::connection()->createQueryBuilder();
    }
}