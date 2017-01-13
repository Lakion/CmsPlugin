<?php

namespace Tests\Lakion\SyliusCmsBundle\Behat\Page\Admin\StringBlock;

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
