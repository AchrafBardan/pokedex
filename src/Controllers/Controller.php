<?php

namespace Achrafbardan\Pokedex\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__.'/../../views');

        $this->twig = new Environment($loader);
    }
}
