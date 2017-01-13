<?php

namespace Tests\Lakion\SyliusCmsBundle\Behat\Page\Admin\StringBlock;

use Sylius\Behat\Page\PageInterface;

interface ShowPageInterface extends PageInterface
{
    /**
     * @return string
     */
    public function getBlockContents();
}
