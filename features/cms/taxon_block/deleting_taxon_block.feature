@taxon_block
Feature: Deleting a taxon block
    In order to remove test, obsolete or incorrect taxon blocks
    As an Administrator
    I want to be able to delete a taxon block

    Background:
        Given the store has "Winter" taxonomy
        And I am logged in as an administrator

    @ui @todo
    Scenario: Deleted taxon block should disappear from the registry
        Given the store has taxon block "winter-sale-info"
        When I delete taxon block "winter-sale-info"
        Then I should be notified that it has been successfully deleted
        And the taxon block "winter-sale-info" should no longer exist in the store
