<?php

namespace spec\Braddle\PokeApi\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokemonSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith(
            123,
            'Elmo',
            5,
            13,
            true,
            9,
            135
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Braddle\PokeApi\Model\Pokemon');
    }

    function it_should_be_able_to_return_the_pokemons_id()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_should_be_able_to_return_the_pokemons_name()
    {
        $this->getName()->shouldReturn('Elmo');
    }

    function it_should_be_able_to_return_the_pokemons_base_experience()
    {
        $this->getBaseExperience()->shouldReturn(5);
    }

    function it_should_be_able_to_return_the_pokemons_height()
    {
        $this->getHeight()->shouldReturn(13);
    }

    function it_should_be_able_to_return_whether_the_pokemon_is_default_for_its_species()
    {
        $this->isDefaultForSpecies()->shouldReturn(true);
    }

    function it_should_be_able_to_return_the_pokemons_sort_order()
    {
        $this->getSortOrder()->shouldReturn(9);
    }

    function it_should_be_able_to_return_the_pokemons_weight()
    {
        $this->getWeight()->shouldReturn(135);
    }
}
