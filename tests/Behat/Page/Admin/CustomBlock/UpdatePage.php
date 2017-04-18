<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\CustomBlock;

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;

class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function changeBodyTo($body)
    {
        $this->getElement('body')->setValue($body);
    }

    /**
     * {@inheritdoc}
     */
    public function changeLinkTo($link)
    {
        $this->getElement('link')->setValue($link);
    }

    /**
     * {@inheritdoc}
     */
    public function changeTitleTo($title)
    {
        $this->getElement('title')->setValue($title);
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->getElement('body')->getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function getLink()
    {
        return $this->getElement('link')->getValue();
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->getElement('title')->getValue();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'body' => '#lakion_cms_custom_block_body',
            'link' => '#lakion_cms_custom_block_linkUrl',
            'title' => '#lakion_cms_custom_block_title',
        ]);
    }
}
