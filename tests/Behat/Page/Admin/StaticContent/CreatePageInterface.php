<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\StaticContent;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $body
     */
    public function setBody($body);
}
