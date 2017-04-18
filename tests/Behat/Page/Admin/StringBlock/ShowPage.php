<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\StringBlock;

use Sylius\Behat\Page\SymfonyPage;

class ShowPage extends SymfonyPage implements ShowPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBlockContents()
    {
        return $this->getElement('block')->getHtml();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'block' => '#lakion_cms_block_preview',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        return 'lakion_cms_admin_string_block_show';
    }
}
