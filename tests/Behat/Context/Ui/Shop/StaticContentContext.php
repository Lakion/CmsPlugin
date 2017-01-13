<?php

namespace Tests\Lakion\SyliusCmsBundle\Behat\Context\Ui\Shop;

use Behat\Behat\Context\Context;
use Tests\Lakion\SyliusCmsBundle\Behat\Page\Shop\StaticContentPageInterface;
use Lakion\SyliusCmsBundle\Document\StaticContent;

final class StaticContentContext implements Context
{
    /**
     * @var StaticContentPageInterface
     */
    private $staticContentPage;

    /**
     * @param StaticContentPageInterface $staticContentPage
     */
    public function __construct(StaticContentPageInterface $staticContentPage)
    {
        $this->staticContentPage = $staticContentPage;
    }

    /**
     * @When I access static content with name :name
     */
    public function iAccessStaticContentWithName($name)
    {
        $this->staticContentPage->tryToOpen(['name' => $name]);
    }

    /**
     * @Then /^I should see (that static content)$/
     */
    public function iShouldSeeThatStaticContent(StaticContent $staticContent)
    {
        $this->staticContentPage->assertPageHasContent($staticContent);
    }

    /**
     * @Then /^(that static content) should not be found there$/
     */
    public function thatPageShouldNotBeFound(StaticContent $staticContent)
    {
        try {
            $this->iShouldSeeThatStaticContent($staticContent);
        } catch (\Exception $exception) {
            return;
        }

        throw new \DomainException(sprintf('Static content "%s" was found!', $staticContent->getTitle()));
    }
}
