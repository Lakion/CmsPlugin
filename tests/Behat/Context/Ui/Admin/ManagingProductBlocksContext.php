<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Lakion\CmsPlugin\Document\ProductBlock;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock\CreatePageInterface;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock\ShowPageInterface;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock\UpdatePageInterface;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

final class ManagingProductBlocksContext implements Context
{
    /**
     * @var IndexPageInterface
     */
    private $indexPage;

    /**
     * @var CreatePageInterface
     */
    private $createPage;

    /**
     * @var UpdatePageInterface
     */
    private $updatePage;

    /**
     * @var ShowPageInterface
     */
    private $showPage;

    /**
     * @param IndexPageInterface $indexPage
     * @param CreatePageInterface $createPage
     * @param UpdatePageInterface $updatePage
     * @param ShowPageInterface $showPage
     */
    public function __construct(
        IndexPageInterface $indexPage,
        CreatePageInterface $createPage,
        UpdatePageInterface $updatePage,
        ShowPageInterface $showPage
    ) {
        $this->indexPage = $indexPage;
        $this->createPage = $createPage;
        $this->updatePage = $updatePage;
        $this->showPage = $showPage;
    }

    /**
     * @Given I want to create a new product block
     * @Given I want to add a new product block
     */
    public function iWantToCreateNewProductBlock()
    {
        $this->createPage->open();
    }

    /**
     * @Given I browse product blocks of the store
     */
    public function iWantToBrowseProductBlocksOfTheStore()
    {
        $this->indexPage->open();
    }

    /**
     * @Given I have created a product block :name with image :imagePath
     */
    public function iHaveCreatedProductBlockWithImage($name, $imagePath)
    {
        $this->iWantToCreateNewProductBlock();
        $this->iSetItsNameTo($name);
        $this->iAttachAsItsImage($imagePath);
        $this->iAddIt();
    }

    /**
     * @When I set its body to :body
     */
    public function iSetItsBodyTo($body)
    {
        $this->createPage->setBody($body);
    }

    /**
     * @When I set its link to :link
     */
    public function iSetItsLinkTo($link)
    {
        $this->createPage->setLink($link);
    }

    /**
     * @When I set its name to :name
     */
    public function iSetItsNameTo($name)
    {
        $this->createPage->setName($name);
    }

    /**
     * @When I set its title to :title
     */
    public function iSetItsTitleTo($title)
    {
        $this->createPage->setTitle($title);
    }

    /**
     * @When I choose :productName as its product
     */
    public function iChooseProduct($productName)
    {
        $this->createPage->chooseProduct($productName);
    }

    /**
     * @When I attach :imagePath as its image
     */
    public function iAttachAsItsImage($imagePath)
    {
        $this->createPage->attachImage($imagePath);
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt()
    {
        $this->createPage->create();
    }

    /**
     * @Then /^I should be notified that (body|name) is required$/
     */
    public function iShouldBeNotifiedThatElementIsRequired($element)
    {
        Assert::same(
            $this->createPage->getValidationMessage($element),
            'This value should not be blank.'
        );
    }

    /**
     * @Then the product block :name should appear in the store
     * @Then I should see the product block :name in the list
     */
    public function theProductBlockShouldAppearInTheStore($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::true($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Then I should see :amount product blocks in the list
     */
    public function iShouldSeeThatManyProductBlocksInTheList($amount)
    {
        Assert::same(
            (int) $amount,
            $this->indexPage->countItems(),
            'Amount of product blocks should be equal %s, but was %2$s.'
        );
    }

    /**
     * @Then the product block :name should not be added
     */
    public function theProductBlockShouldNotBeAdded($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @When /^I preview (this product block)$/
     * @When I preview product block :productBlock
     */
    public function iPreviewProductBlock(ProductBlock $productBlock)
    {
        $this->showPage->open(['id' => $productBlock->getId()]);
    }

    /**
     * @Given /^I want to edit (this product block)$/
     */
    public function iWantToEditThisProductBlock(ProductBlock $productBlock)
    {
        $this->updatePage->open(['id' => $productBlock->getId()]);
    }

    /**
     * @When I change its body to :body
     */
    public function iChangeItsBodyTo($body)
    {
        $this->updatePage->changeBodyTo($body);
    }

    /**
     * @When I change its link to :link
     */
    public function iChangeItsLinkTo($link)
    {
        $this->updatePage->changeLinkTo($link);
    }

    /**
     * @When I change its title to :title
     */
    public function iChangeItsTitleTo($title)
    {
        $this->updatePage->changeTitleTo($title);
    }

    /**
     * @When I change its product to :productName
     */
    public function iChangeItsProductTo($productName)
    {
        $this->updatePage->changeProductTo($productName);
    }

    /**
     * @When I save my changes
     * @When I try to save my changes
     */
    public function iSaveMyChanges()
    {
        $this->updatePage->saveChanges();
    }

    /**
     * @When I delete product block :name
     */
    public function iDeleteProductBlock($name)
    {
        $this->indexPage->open();
        $this->indexPage->deleteResourceOnPage(['name' => $name]);
    }

    /**
     * @Then I should see :expected in this block contents
     */
    public function iShouldSeeInThisBlockContents($expected)
    {
        Assert::contains($this->showPage->getBlockContents(), $expected);
    }

    /**
     * @Then I should see an image
     */
    public function iShouldSeeImage()
    {
        // TODO: No other way to be sure that image was uploaded properly without messing with setting up the server
        Assert::notEmpty($this->showPage->getBlockImageUrl());
    }

    /**
     * @Then /^(this product block) should have body "([^"]+)"$/
     */
    public function thisProductBlockShouldHaveBody(ProductBlock $productBlock, $body)
    {
        $this->updatePage->open(['id' => $productBlock->getId()]);

        Assert::same($this->updatePage->getBody(), $body);
    }

    /**
     * @Then /^(this product block) should have link "([^"]+)"$/
     */
    public function thisProductBlockShouldHaveLink(ProductBlock $productBlock, $link)
    {
        $this->updatePage->open(['id' => $productBlock->getId()]);

        Assert::same($this->updatePage->getLink(), $link);
    }

    /**
     * @Then /^(this product block) should have title "([^"]+)"$/
     */
    public function thisProductBlockShouldHaveTitle(ProductBlock $productBlock, $title)
    {
        $this->updatePage->open(['id' => $productBlock->getId()]);

        Assert::same($this->updatePage->getTitle(), $title);
    }

    /**
     * @Then /^(this product block) should have product "([^"]+)"$/
     */
    public function thisProductBlockShouldHaveProduct(ProductBlock $productBlock, $productName)
    {
        $this->updatePage->open(['id' => $productBlock->getId()]);

        Assert::same($this->updatePage->getProduct(), $productName);
    }

    /**
     * @Then the product block :name should no longer exist in the store
     */
    public function theProductBlockShouldNoLongerExistInTheStore($name)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }
}
