<?php

namespace spec\Braddle\PokeApi\Factory;

use Braddle\PokeApi\Model\Pokemon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokemonFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Braddle\PokeApi\Factory\PokemonFactory');
    }

    function it_should_return_a_pokemon_when_given_valid_data()
    {
        $data = [
            'id' => 34,
            'name' => '',
            'base_experience' => 4,
            'height' => 15,
            'is_default' => false,
            'order' => 1,
            'weight' => 468,
        ];

        $this->createPokemon($data)->shouldReturnPokemon();
    }

    public function getMatchers()
    {
        $matchers = parent::getMatchers();

        $matchers['returnPokemon'] = function($subject) {
            return ($subject instanceof Pokemon);
        };

        return $matchers;
    }
}
