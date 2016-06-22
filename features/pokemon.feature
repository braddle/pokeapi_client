Feature: TODO

  Scenario: Ensure that is it possible to find a Pokemon by its ID
    Given The client has been instantiated
    When I try to find a Pokemon by ID 1
    Then I should have been returned a Pokemon

    Scenario: Ensure that an exception is thrown if you try to find a Pokemon by ID and it does not exist
      Given The client has been instantiated
      When I try to find a Pokemon by ID 999999
      Then  I should see a "PokemonNotFoundException" thrown
