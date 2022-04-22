<?php

namespace Achrafbardan\Pokedex\Library;

class PokemonManager
{
    /**
     * Create new pokemon.
     */
    public static function create(array $data)
    {
        $targetDirRelative = '/storage/pokemons/';

        $target_file = $_SERVER['DOCUMENT_ROOT'] . $targetDirRelative . basename($data['image']["name"]);

        move_uploaded_file($data['image']["tmp_name"], $target_file);

        QueryBuilder::make()->insert('pokemons')->values([
            'name' => '?',
            'pokemonNr' => '?',
            'image' => '?',
            'type' => '?',
            'height' => '?',
            'weight' => '?',
            'userId' => '?',
        ])
        ->setParameters([
            $data['name'],
            $data['pokemonNr'],
            $targetDirRelative . basename($data['image']["name"]),
            $data['type'],
            $data['height'],
            $data['weight'],
            UserManager::currentUser()['id'],
        ])->executeQuery();
    }
}