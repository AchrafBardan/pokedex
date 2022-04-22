<?php

namespace Achrafbardan\Pokedex\Controllers\Auth;

use Achrafbardan\Pokedex\Controllers\Controller;

class LogoutController extends Controller
{
    public function store()
    {
        unset($_SESSION['user']);

        $this->redirect('/pokemons');
    }
}
