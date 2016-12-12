<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Shop;

use Lakion\SyliusCmsBundle\Tests\Behat\Page\SymfonyPageInterface;
use Lakion\SyliusCmsBundle\Document\StaticContent;

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
