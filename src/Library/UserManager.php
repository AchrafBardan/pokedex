<?php

namespace Achrafbardan\Pokedex\Library;

class UserManager
{
    /**
     * Create a new user.
     */
    public static function create(array $data)
    {
        if(QueryBuilder::make()->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $data['email'])
            ->executeQuery()
            ->fetchAllAssociative()) {
            throw new \Exception('User already exists');
        }
        
        QueryBuilder::make()->insert('users')
            ->values([
                'name' => '?',
                'email' => '?',
                'password' => '?',
            ])
            ->setParameters([
                $data['name'],
                $data['email'],
                password_hash($data['password'], PASSWORD_DEFAULT),
            ])
            ->executeQuery();

        return AuthManager::login($data);
    }

    /**
     * Get current user.
     */
    public static function currentUser()
    {
        if(!isset($_SESSION['user'])) {
            return null;
        }

        return $_SESSION['user'];
    }
}