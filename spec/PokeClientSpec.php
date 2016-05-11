<?php

namespace spec\Braddle\PokeApi;

use Braddle\PokeApi\PokeClient;
use GuzzleHttp\ClientInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokeClientSpec extends ObjectBehavior
{
    function let (ClientInterface $httpClient)
    {
        $this->beConstructedWith($httpClient);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Braddle\PokeApi\PokeClient');
    }

    function it_should_be_able_to_create_an_instance_of_itself()
    {
        $this::create()->shouldReturnAnInstanceOf(PokeClient::class);
    }
}
