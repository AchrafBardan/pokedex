<?php

use Achrafbardan\Pokedex\Controllers\Pokemons\PokemonController;

return [
    'GET /api/pokemons' => PokemonController::class . '@indexApi',
];