@custom_block
Feature: Deleting a custom block
    In order to remove test, obsolete or incorrect custom blocks
    As an Administrator
    I want to be able to delete a custom block

    Background:
        Given I am logged in as an administrator

    @ui @todo
    Scenario: Deleted custom block should disappear from the registry
        Given the store has custom block "winter-sale-info"
        When I delete custom block "winter-sale-info"
        Then I should be notified that it has been successfully deleted
        And the custom block "winter-sale-info" should no longer exist in the store
