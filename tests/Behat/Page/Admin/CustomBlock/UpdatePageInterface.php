<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\CustomBlock;

use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface as BaseUpdatePageInterface;

interface UpdatePageInterface extends BaseUpdatePageInterface
{
    /**
     * @param string $body
     */
    public function changeBodyTo($body);

    /**
     * @param string $link
     */
    public function changeLinkTo($link);

    /**
     * @param string $title
     */
    public function changeTitleTo($title);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return string
     */
    public function getLink();

    /**
     * @return string
     */
    public function getTitle();
}
