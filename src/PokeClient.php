<?php

namespace Braddle\PokeApi;

use Braddle\PokeApi\Exception\PokemonNotFoundException;
use Braddle\PokeApi\Factory\PokemonFactory;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class PokeClient
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $httpClient;

    /**
     * @var \Braddle\PokeApi\Factory\PokemonFactory
     */
    private $pokemonFactory;

    /**
     * PokeClient constructor.
     */
    public function __construct(ClientInterface $httpClient, PokemonFactory $pokemonFactory)
    {
        $this->httpClient = $httpClient;
        $this->pokemonFactory = $pokemonFactory;
    }

    public static function create()
    {
        $httpClient = new Client(
            [
                'base_uri' => 'http://pokeapi.co/api/v2/',
            ]
        );

        return new self($httpClient, new PokemonFactory());
    }

    public function findPokemonById($pokemonId)
    {
        try {
            $response = $this->httpClient->request('GET', 'pokemon/' . $pokemonId);
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response->getStatusCode() == 404) {
                throw new PokemonNotFoundException('Could not find a pokemon with identifier ' . $pokemonId);
            }
        }

        $json = $response->getBody()->getContents();
        $body = json_decode($json, true);

        $pokemon = $this->pokemonFactory->createPokemon($body);

        return $pokemon;
    }
}
