<?php

namespace Achrafbardan\Pokedex\Library;

class AuthManager 
{
    /**
     * Login user.
     */
    public static function login(array $data)
    {
        $user = QueryBuilder::make()->select('*')
            ->from('users')
            ->where('email = ?')
            ->setParameter(0, $data['email'])
            ->executeQuery()
            ->fetchAllAssociative()[0];

        if(!$user) {
            throw new \Exception('User not found');
        }

        if(!password_verify($data['password'], $user['password'])) {
            throw new \Exception('Invalid password');
        }

        $_SESSION['user'] = $user;

        return $user;
    }
}