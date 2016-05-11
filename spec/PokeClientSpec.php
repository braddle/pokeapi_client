<?php

namespace spec\Braddle\PokeApi;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PokeClientSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Braddle\PokeApi\PokeClient');
    }
}
