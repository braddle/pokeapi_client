<?php

namespace Braddle\PokeApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class PokeClient
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $httpClient;

    /**
     * PokeClient constructor.
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public static function create()
    {
        $httpClient = new Client(
            [
                'base_uri' => 'http://pokeapi.co/api/v2/',
            ]
        );

        return new self($httpClient);
    }
}
