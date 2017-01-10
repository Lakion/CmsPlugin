@custom_block
Feature: Browsing custom blocks
    In order to see all custom blocks in the store
    As an Administrator
    I want to browse custom blocks

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Browsing custom blocks in store
        Given the store has custom block "summer-sale-info"
        When I browse custom blocks of the store
        Then I should see 1 custom blocks in the list
        And I should see the custom block "summer-sale-info" in the list

    @ui
    Scenario: Preview custom block
        Given the store has custom block "delivery-info" with body "Delivery only to the US!"
        When I preview this custom block
        Then I should see "Delivery only to the US!" in this block contents

    @ui
    Scenario: Preview custom block with an image
        Given I have created a custom block "logo" with image "logo.png"
        When I preview custom block "logo"
        Then I should see an image
