<?php

namespace Tests\Lakion\SyliusCmsBundle\Behat\Page\Admin\Route;

use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface as BaseUpdatePageInterface;

interface UpdatePageInterface extends BaseUpdatePageInterface
{
    /**
     * @param string $title
     */
    public function chooseNewContent($title);
}
