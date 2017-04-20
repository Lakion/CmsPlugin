<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\ProductBlock;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $this->getSession()->getPage()->fillField('Body', $body);
    }

    /**
     * {@inheritdoc}
     */
    public function setLink($link)
    {
        $this->getSession()->getPage()->fillField('Link', $link);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->getSession()->getPage()->fillField('Name', $name);
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->getSession()->getPage()->fillField('Title', $title);
    }

    /**
     * {@inheritdoc}
     */
    public function chooseProduct($productName)
    {
        $this->getSession()->getPage()->selectFieldOption('Product', $productName);
    }

    /**
     * {@inheritdoc}
     */
    public function attachImage($relativePath)
    {
        $this->getSession()->getPage()->attachFileToField('Image', (string) $this->getParameter('files_path') . $relativePath);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'body' => '#lakion_cms_product_block_body',
            'link' => '#lakion_cms_product_block_linkUrl',
            'name' => '#lakion_cms_product_block_name',
            'product' => '#lakion_cms_product_block_product',
            'title' => '#lakion_cms_product_block_title',
        ]);
    }
}
