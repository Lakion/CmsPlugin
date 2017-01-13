<?php

namespace Tests\Lakion\SyliusCmsBundle\Behat\Page\Shop;

use Lakion\SyliusCmsBundle\Document\StaticContent;
use Sylius\Behat\Page\SymfonyPageInterface;

interface StaticContentPageInterface extends SymfonyPageInterface
{
    /**
     * @param string $path
     */
    public function access($path);

    /**
     * @param StaticContent $staticContent
     *
     * @throws \InvalidArgumentException
     */
    public function assertPageHasContent(StaticContent $staticContent);
}
