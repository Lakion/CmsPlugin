<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\StringBlock;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

class CreatePage extends BaseCreatePage implements CreatePageInterface
{
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
            'body' => '#lakion_cms_string_block_body',
            'name' => '#lakion_cms_string_block_name',
        ]);
    }
}
