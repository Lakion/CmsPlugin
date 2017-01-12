@custom_block
Feature: Adding a new custom block
    In order to manage custom blocks
    As an Administrator
    I want to add custom block to my site

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Adding custom block
        Given I want to add a new custom block
        When I set its name to "free-shipping-info"
        And I set its title to "Free shipping"
        And I set its body to "Free shipping for orders over 40$"
        And I add it
        Then I should be notified that it has been successfully created
        And the custom block "free-shipping-info" should appear in the store

    @ui
    Scenario: Adding custom block with name and title
        Given I want to add a new custom block
        When I set its name to "free-shipping-info"
        And I set its title to "Free shipping"
        And I add it
        Then I should be notified that it has been successfully created
        And the custom block "free-shipping-info" should appear in the store

    @ui
    Scenario: Adding custom block with name and body
        Given I want to add a new custom block
        When I set its name to "free-shipping-info"
        And I set its body to "Free shipping for orders over 40$"
        And I add it
        Then I should be notified that it has been successfully created
        And the custom block "free-shipping-info" should appear in the store

    @ui
    Scenario: Adding custom block with name and link
        Given I want to add a new custom block
        When I set its name to "the-best-website"
        And I set its link to "http://www.krzysztofkrawczyk.eu/"
        And I add it
        Then I should be notified that it has been successfully created
        And the custom block "the-best-website" should appear in the store

    @ui
    Scenario: Adding custom block with name and image
        Given I want to add a new custom block
        When I set its name to "the-best-website"
        And I attach "logo.png" as its image
        And I add it
        Then I should be notified that it has been successfully created
        And the custom block "the-best-website" should appear in the store
