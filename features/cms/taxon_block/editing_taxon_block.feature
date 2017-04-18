@taxon_block
Feature: Editing a taxon block
    In order to change taxon block
    As an Administrator
    I want to be able to edit a taxon block

    Background:
        Given the store has "Heron" taxonomy
        And I am logged in as an administrator

    @ui @javascript @todo
    Scenario: Changing taxon of a taxon block
        Given the store has "Banana" taxonomy
        And the store has taxon block "delivery-info" with taxon "Heron"
        And I want to edit this taxon block
        When I change its taxon to "Banana"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this taxon block should have taxon "Banana"

    @ui
    Scenario: Changing title of a taxon block
        Given the store has taxon block "delivery-info" with title "Payment-related announcement"
        And I want to edit this taxon block
        When I change its title to "Delivery-related announcement"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this taxon block should have title "Delivery-related announcement"

    @ui
    Scenario: Changing body of a taxon block
        Given the store has taxon block "delivery-info" with body "Delivery only to the US!"
        And I want to edit this taxon block
        When I change its body to "We deliver everywhere!"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this taxon block should have body "We deliver everywhere!"

    @ui
    Scenario: Changing link of a taxon block
        Given the store has taxon block "the-best-website" with link "http://www.rynkowski.art.pl/"
        And I want to edit this taxon block
        When I change its link to "http://www.krzysztofkrawczyk.eu/"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this taxon block should have link "http://www.krzysztofkrawczyk.eu/"
