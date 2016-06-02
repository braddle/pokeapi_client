<?php

namespace Braddle\PokeApi\Factory;

use Braddle\PokeApi\Model\Pokemon;

class PokemonFactory
{
    public function createPokemon($pokemonData)
    {
        return new Pokemon(
            $pokemonData['id'],
            $pokemonData['name'],
            $pokemonData['base_experience'],
            $pokemonData['height'],
            $pokemonData['is_default'],
            $pokemonData['order'],
            $pokemonData['weight']
        );
    }
}
