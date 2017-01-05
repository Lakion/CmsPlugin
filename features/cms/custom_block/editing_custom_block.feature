@custom_block
Feature: Editing a custom block
    In order to change custom block
    As an Administrator
    I want to be able to edit a custom block

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Changing title of a custom block
        Given the store has custom block "delivery-info" with title "Payment-related announcement"
        And I want to edit this custom block
        When I change its title to "Delivery-related announcement"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this custom block should have title "Delivery-related announcement"

    @ui
    Scenario: Changing body of a custom block
        Given the store has custom block "delivery-info" with body "Delivery only to the US!"
        And I want to edit this custom block
        When I change its body to "We deliver everywhere!"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this custom block should have body "We deliver everywhere!"

    @ui
    Scenario: Changing link of a custom block
        Given the store has custom block "the-best-website" with link "http://www.rynkowski.art.pl/"
        And I want to edit this custom block
        When I change its link to "http://www.krzysztofkrawczyk.eu/"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this custom block should have link "http://www.krzysztofkrawczyk.eu/"
