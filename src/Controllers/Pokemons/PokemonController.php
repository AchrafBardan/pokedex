<?php

namespace Achrafbardan\Pokedex\Controllers\Pokemons;

use Achrafbardan\Pokedex\Controllers\Controller;
use Achrafbardan\Pokedex\Library\PokemonManager;
use Achrafbardan\Pokedex\Library\UserManager;

class PokemonController extends Controller
{
    public function index()
    {
        echo $this->twig->render('pokemons/index.html');
    }

    public function indexApi()
    {
        echo $this->twig->render('pokemons/indexApi.html', [
            'pokemons' => $this->queryBuilder()->from('pokemons')->select('*')->executeQuery()->fetchAllAssociative(),
        ]);
    }

    public function create()
    {
        if(!UserManager::currentUser()) {
            $this->redirect('/login');
        }
        
        echo $this->twig->render('pokemons/create.html');
    }

    public function store()
    {
        try {
            PokemonManager::create([
                ...$this->request->request->all(),
                'image' => $_FILES['image'],
            ]);

            $this->redirect('/pokemons');
        } catch (\Throwable $th) {
            echo $this->twig->render('pokemons/create.html', [
                'message' => $th->getMessage(),
            ]);
        }
    }
}
