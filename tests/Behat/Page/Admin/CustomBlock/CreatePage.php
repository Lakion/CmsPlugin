<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\CustomBlock;

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
            'body' => '#lakion_cms_custom_block_body',
            'link' => '#lakion_cms_custom_block_linkUrl',
            'name' => '#lakion_cms_custom_block_name',
            'title' => '#lakion_cms_custom_block_title',
        ]);
    }
}
