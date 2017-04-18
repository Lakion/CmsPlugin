<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\Route;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $title
     */
    public function chooseContent($title);
}
