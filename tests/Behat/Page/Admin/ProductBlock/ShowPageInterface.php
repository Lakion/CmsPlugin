<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock;

use Sylius\Behat\Page\PageInterface;

interface ShowPageInterface extends PageInterface
{
    /**
     * @return string
     */
    public function getBlockContents();

    /**
     * @return string
     */
    public function getBlockImageUrl();
}
