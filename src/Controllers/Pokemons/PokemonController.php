<?php

namespace Achrafbardan\Pokedex\Controllers\Pokemons;

use Achrafbardan\Pokedex\Controllers\Controller;

class PokemonController extends Controller
{
    public function index()
    {
        echo $this->twig->render('pokemons/index.html', [
            'pokemons' => $this->queryBuilder->from('pokemons')->select('*')->executeQuery()->fetchAllAssociative(),
        ]);
    }
}
