<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Admin\Route;

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;

final class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function chooseNewContent($title)
    {
        $this->getSession()->getPage()->selectFieldOption('Content', $title);
    }
}
