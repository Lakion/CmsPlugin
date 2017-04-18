<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\StaticContent;

use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface as BaseUpdatePageInterface;

interface UpdatePageInterface extends BaseUpdatePageInterface
{
    /**
     * @param string $body
     */
    public function changeBodyTo($body);

    /**
     * @return string
     */
    public function getBody();
}
