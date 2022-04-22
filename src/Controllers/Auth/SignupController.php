<?php

namespace Achrafbardan\Pokedex\Controllers\Auth;

use Achrafbardan\Pokedex\Controllers\Controller;
use Achrafbardan\Pokedex\Library\UserManager;

class SignupController extends Controller
{
    public function index()
    {
        echo $this->twig->render('auth/signup/index.html');
    }

    public function store()
    {
        try {
            UserManager::create($this->request->request->all());

            $this->redirect('/pokemons');
        } catch (\Throwable $th) {
            echo $this->twig->render('auth/signup/index.html', [
                'message' => $th->getMessage(),
            ]);
        }
    }
}
