@taxon_block
Feature: Adding a new taxon block
    In order to manage taxon blocks
    As an Administrator
    I want to add taxon block to my site

    Background:
        Given the store has "Heron" taxonomy
        And I am logged in as an administrator

    @ui @javascript @todo
    Scenario: Adding a new taxon block
        Given I want to add a new taxon block
        When I set its name to "free-shipping-for-herons"
        And I choose "Heron" as its taxon
        And I add it
        Then I should be notified that it has been successfully created
        And the taxon block "free-shipping-for-herons" should appear in the store

    @ui @javascript @todo
    Scenario: Adding a new taxon block with taxon, name and title
        Given I want to add a new taxon block
        When I set its name to "free-shipping-for-herons"
        And I choose "Heron" as its taxon
        And I set its title to "Free shipping"
        And I add it
        Then I should be notified that it has been successfully created
        And the taxon block "free-shipping-for-herons" should appear in the store

    @ui @javascript @todo
    Scenario: Adding a new taxon block with taxon, name and body
        Given I want to add a new taxon block
        When I set its name to "free-shipping-for-herons"
        And I choose "Heron" as its taxon
        And I set its body to "Free shipping for orders over 40$"
        And I add it
        Then I should be notified that it has been successfully created
        And the taxon block "free-shipping-for-herons" should appear in the store

    @ui @javascript @todo
    Scenario: Adding a new taxon block with taxon, name and link
        Given I want to add a new taxon block
        When I set its name to "the-best-heron"
        And I choose "Heron" as its taxon
        And I set its link to "http://www.krzysztofkrawczyk.eu/"
        And I add it
        Then I should be notified that it has been successfully created
        And the taxon block "the-best-heron" should appear in the store

    @ui @javascript @todo
    Scenario: Adding a new taxon block with taxon, name and image
        Given I want to add a new taxon block
        When I set its name to "the-best-heron"
        And I choose "Heron" as its taxon
        And I attach "logo.png" as its image
        And I add it
        Then I should be notified that it has been successfully created
        And the taxon block "the-best-heron" should appear in the store
