@product_block
Feature: Deleting a product block
    In order to remove test, obsolete or incorrect product blocks
    As an Administrator
    I want to be able to delete a product block

    Background:
        Given I am logged in as an administrator

    @ui @todo
    Scenario: Deleted product block should disappear from the registry
        Given the store has product block "winter-sale-info"
        When I delete product block "winter-sale-info"
        Then I should be notified that it has been successfully deleted
        And the product block "winter-sale-info" should no longer exist in the store
