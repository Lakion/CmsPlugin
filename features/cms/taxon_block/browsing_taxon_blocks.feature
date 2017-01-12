@taxon_block
Feature: Browsing taxon blocks
    In order to see all taxon blocks in the store
    As an Administrator
    I want to browse taxon blocks

    Background:
        Given the store has "Heron" taxonomy
        And I am logged in as an administrator

    @ui
    Scenario: Browsing taxon blocks in store
        Given the store has taxon block "summer-sale-info"
        When I browse taxon blocks of the store
        Then I should see 1 taxon blocks in the list
        And I should see the taxon block "summer-sale-info" in the list

    @ui
    Scenario: Preview taxon block
        Given the store has taxon block "free-heron-delivery" with taxon "Heron"
        When I preview this taxon block
        Then I should see "Heron" in this block contents
