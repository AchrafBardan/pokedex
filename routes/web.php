<?php

use Achrafbardan\Pokedex\Controllers\Auth\AuthController;
use Achrafbardan\Pokedex\Controllers\Auth\LoginController;
use Achrafbardan\Pokedex\Controllers\Auth\LogoutController;
use Achrafbardan\Pokedex\Controllers\Auth\SignupController;
use Achrafbardan\Pokedex\Controllers\Pokemons\PokemonController;

return [
    'GET /pokemons' => PokemonController::class.'@index',
    'GET /pokemons/create' => PokemonController::class.'@create',
    'POST /pokemons/create' => PokemonController::class.'@store',
    'GET /signup' => SignupController::class.'@index',
    'POST /signup' => SignupController::class.'@store',
    'GET /login' => LoginController::class.'@index',
    'POST /login' => LoginController::class.'@store',
    'POST /logout' => LogoutController::class.'@store',
];