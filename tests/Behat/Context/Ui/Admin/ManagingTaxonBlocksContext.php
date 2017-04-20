<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Lakion\CmsPlugin\Document\TaxonBlock;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock\CreatePageInterface;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock\ShowPageInterface;
use Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock\UpdatePageInterface;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use Webmozart\Assert\Assert;

final class ManagingTaxonBlocksContext implements Context
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
     * @Given I want to create a new taxon block
     * @Given I want to add a new taxon block
     */
    public function iWantToCreateNewTaxonBlock()
    {
        $this->createPage->open();
    }

    /**
     * @Given I browse taxon blocks of the store
     */
    public function iWantToBrowseTaxonBlocksOfTheStore()
    {
        $this->indexPage->open();
    }

    /**
     * @Given I have created a taxon block :name with image :imagePath
     */
    public function iHaveCreatedTaxonBlockWithImage($name, $imagePath)
    {
        $this->iWantToCreateNewTaxonBlock();
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
     * @When I choose :taxonName as its taxon
     */
    public function iChooseTaxon($taxonName)
    {
        $this->createPage->chooseTaxon($taxonName);
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
     * @Then the taxon block :name should appear in the store
     * @Then I should see the taxon block :name in the list
     */
    public function theTaxonBlockShouldAppearInTheStore($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::true($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @Then I should see :amount taxon blocks in the list
     */
    public function iShouldSeeThatManyTaxonBlocksInTheList($amount)
    {
        Assert::same(
            (int) $amount,
            $this->indexPage->countItems(),
            'Amount of taxon blocks should be equal %s, but was %2$s.'
        );
    }

    /**
     * @Then the taxon block :name should not be added
     */
    public function theTaxonBlockShouldNotBeAdded($name)
    {
        if (!$this->indexPage->isOpen()) {
            $this->indexPage->open();
        }

        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }

    /**
     * @When /^I preview (this taxon block)$/
     * @When I preview taxon block :taxonBlock
     */
    public function iPreviewTaxonBlock(TaxonBlock $taxonBlock)
    {
        $this->showPage->open(['id' => $taxonBlock->getId()]);
    }

    /**
     * @Given /^I want to edit (this taxon block)$/
     */
    public function iWantToEditThisTaxonBlock(TaxonBlock $taxonBlock)
    {
        $this->updatePage->open(['id' => $taxonBlock->getId()]);
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
     * @When I change its taxon to :taxonName
     */
    public function iChangeItsTaxonTo($taxonName)
    {
        $this->updatePage->changeTaxonTo($taxonName);
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
     * @When I delete taxon block :name
     */
    public function iDeleteTaxonBlock($name)
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
     * @Then /^(this taxon block) should have body "([^"]+)"$/
     */
    public function thisTaxonBlockShouldHaveBody(TaxonBlock $taxonBlock, $body)
    {
        $this->updatePage->open(['id' => $taxonBlock->getId()]);

        Assert::same($this->updatePage->getBody(), $body);
    }

    /**
     * @Then /^(this taxon block) should have link "([^"]+)"$/
     */
    public function thisTaxonBlockShouldHaveLink(TaxonBlock $taxonBlock, $link)
    {
        $this->updatePage->open(['id' => $taxonBlock->getId()]);

        Assert::same($this->updatePage->getLink(), $link);
    }

    /**
     * @Then /^(this taxon block) should have title "([^"]+)"$/
     */
    public function thisTaxonBlockShouldHaveTitle(TaxonBlock $taxonBlock, $title)
    {
        $this->updatePage->open(['id' => $taxonBlock->getId()]);

        Assert::same($this->updatePage->getTitle(), $title);
    }

    /**
     * @Then /^(this taxon block) should have taxon "([^"]+)"$/
     */
    public function thisTaxonBlockShouldHaveTaxon(TaxonBlock $taxonBlock, $taxonName)
    {
        $this->updatePage->open(['id' => $taxonBlock->getId()]);

        Assert::same($this->updatePage->getTaxon(), $taxonName);
    }

    /**
     * @Then the taxon block :name should no longer exist in the store
     */
    public function theTaxonBlockShouldNoLongerExistInTheStore($name)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['name' => $name]));
    }
}
