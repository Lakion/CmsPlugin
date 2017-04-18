<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\StaticContent;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
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
    public function setName($name)
    {
        $this->getSession()->getPage()->fillField('Internal name', $name);
    }

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
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'body' => '#lakion_cms_static_content_body',
            'name' => '#lakion_cms_static_content_name',
            'title' => '#lakion_cms_static_content_title',
        ]);
    }
}
