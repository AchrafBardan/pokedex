<?php

use Achrafbardan\Pokedex\Controllers\Pokemons\PokemonController;

return [
    'GET /pokemons' => PokemonController::class . '@index',
];