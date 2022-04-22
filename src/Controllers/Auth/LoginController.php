<?php

namespace Achrafbardan\Pokedex\Controllers\Auth;

use Achrafbardan\Pokedex\Controllers\Controller;
use Achrafbardan\Pokedex\Library\AuthManager;

class LoginController extends Controller
{
    public function index()
    {
        echo $this->twig->render('auth/login/index.html');
    }

    public function store()
    {
        try {
            AuthManager::login($this->request->request->all());
            
            $this->redirect('/pokemons');
        } catch (\Throwable $th) {
            echo $this->twig->render('auth/login/index.html', [
                'message' => $th->getMessage(),
            ]);
        }

    }
}
