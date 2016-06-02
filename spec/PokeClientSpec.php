<?php

namespace spec\Braddle\PokeApi;

use Braddle\PokeApi\Exception\PokemonNotFoundException;
use Braddle\PokeApi\Factory\PokemonFactory;
use Braddle\PokeApi\Model\Pokemon;
use Braddle\PokeApi\PokeClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\StreamInterface;

class PokeClientSpec extends ObjectBehavior
{
    function let(Client $httpClient, PokemonFactory $pokemonFactory)
    {
        $this->beConstructedWith($httpClient, $pokemonFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Braddle\PokeApi\PokeClient');
    }

    function it_should_be_able_to_create_an_instance_of_itself()
    {
        $this::create()->shouldReturnAnInstanceOf(PokeClient::class);
    }

    function it_should_return_a_pokemon_when_attmepting_to_find_one_by_id(
        Client $httpClient,
        PokemonFactory $pokemonFactory,
        Response $response,
        StreamInterface $stream,
        Pokemon $pokemon
    ) {
        $pokemonId = 975;

        $json = json_encode(
            [
                'id'              => 34,
                'name'            => '',
                'base_experience' => 4,
                'height'          => 15,
                'is_default'      => false,
                'order'           => 1,
                'weight'          => 468,
            ]
        );

        $response->getBody()->willReturn($stream);
        $stream->getContents()->willReturn($json);

        $httpClient->request('GET', 'pokemon/' . $pokemonId)->willReturn($response);

        $pokemonFactory->createPokemon(Argument::any())->willReturn($pokemon);

        $this->findPokemonById($pokemonId)->shouldReturnAnInstanceOf(Pokemon::class);
    }

    function it_should_throw_an_exception_when_trying_to_find_a_pokemon_by_id_that_does_not_exist(
        Client $httpClient,
        ClientException $exception
    ) {
        $pokemonId = 999;

        $request = new Request('GET', 'pokemon/' . $pokemonId);
        $response = new Response(404);

        $httpClient->request('GET', 'pokemon/' . $pokemonId)->willThrow(new ClientException('TEST', $request, $response));

        $this->shouldThrow(PokemonNotFoundException::class)->during('findPokemonById', [$pokemonId]);
    }
}
