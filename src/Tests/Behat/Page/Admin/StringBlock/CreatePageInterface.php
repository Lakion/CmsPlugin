<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Admin\StringBlock;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $body
     */
    public function setBody($body);
}
