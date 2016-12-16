@custom_block
Feature: Browsing custom blocks
    In order to see all custom blocks in the store
    As an Administrator
    I want to browse custom blocks

    Background:
        Given the store has custom block "summer-sale-info"
        And I am logged in as an administrator

    @ui
    Scenario: Browsing custom blocks in store
        When I browse custom blocks of the store
        Then I should see 1 custom blocks in the list
        And I should see the custom block "summer-sale-info" in the list
