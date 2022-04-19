<?php

use Achrafbardan\Pokedex\Controllers\WelcomeController;

return [
    'GET /' => WelcomeController::class . '@index',
];