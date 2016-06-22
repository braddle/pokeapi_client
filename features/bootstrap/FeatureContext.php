<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Braddle\PokeApi\Model\Pokemon;
use Braddle\PokeApi\PokeClient;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    /**
     * @var PokeClient
     */
    private $client;

    /**
     * @var Pokemon
     */
    private $pokemon;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given The client has been instantiated
     */
    public function theClientHasBeenInstantiated()
    {
        $this->client = PokeClient::create();
    }

    /**
     * @When I try to find a Pokemon by ID :id
     */
    public function iTryToFindAPokemonById($id)
    {
        $this->pokemon = $this->client->findPokemonById($id);
    }

    /**
     * @Then I should have been returned a Pokemon
     */
    public function iShouldHaveBeenReturnedAPokemon()
    {
        if (!$this->pokemon instanceof Pokemon) {
            throw new \Exception('No Pokemon found');
        }
    }
}
