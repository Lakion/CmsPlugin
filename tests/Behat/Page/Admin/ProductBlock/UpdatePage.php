<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock;

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
    public function changeProductTo($productName)
    {
        $this->getElement('product')->selectOption($productName);
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
    public function getProduct()
    {
        return $this->getElement('product')->find('css', 'option:selected')->getText();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'body' => '#lakion_cms_product_block_body',
            'link' => '#lakion_cms_product_block_linkUrl',
            'product' => '#lakion_cms_product_block_product',
            'title' => '#lakion_cms_product_block_title',
        ]);
    }
}
