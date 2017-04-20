@product_block
Feature: Editing a product block
    In order to change product block
    As an Administrator
    I want to be able to edit a product block

    Background:
        Given the store has a product "Heron"
        And I am logged in as an administrator

    @ui @javascript @todo
    Scenario: Changing product of a product block
        Given the store has a product "Banana"
        And the store has product block "delivery-info" with product "Heron"
        And I want to edit this product block
        When I change its product to "Banana"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this product block should have product "Banana"

    @ui
    Scenario: Changing title of a product block
        Given the store has product block "delivery-info" with title "Payment-related announcement"
        And I want to edit this product block
        When I change its title to "Delivery-related announcement"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this product block should have title "Delivery-related announcement"

    @ui
    Scenario: Changing body of a product block
        Given the store has product block "delivery-info" with body "Delivery only to the US!"
        And I want to edit this product block
        When I change its body to "We deliver everywhere!"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this product block should have body "We deliver everywhere!"

    @ui
    Scenario: Changing link of a product block
        Given the store has product block "the-best-website" with link "http://www.rynkowski.art.pl/"
        And I want to edit this product block
        When I change its link to "http://www.krzysztofkrawczyk.eu/"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And this product block should have link "http://www.krzysztofkrawczyk.eu/"
