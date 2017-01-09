<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Admin\CustomBlock;

use Sylius\Behat\Page\PageInterface;

interface ShowPageInterface extends PageInterface
{
    /**
     * @return string
     */
    public function getBlockContents();
}
