<?php

namespace Achrafbardan\Pokedex\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        echo $this->twig->render('welcome.html', [
            'replaceMe' => 'test'
        ]);
    }
}
