@product_block
Feature: Browsing product blocks
    In order to see all product blocks in the store
    As an Administrator
    I want to browse product blocks

    Background:
        Given the store has a product "Heron"
        And I am logged in as an administrator

    @ui
    Scenario: Browsing product blocks in store
        Given the store has product block "summer-sale-info"
        When I browse product blocks of the store
        Then I should see 1 product blocks in the list
        And I should see the product block "summer-sale-info" in the list

    @ui
    Scenario: Preview product block
        Given the store has product block "free-heron-delivery" with product "Heron"
        When I preview this product block
        Then I should see "Heron" in this block contents
