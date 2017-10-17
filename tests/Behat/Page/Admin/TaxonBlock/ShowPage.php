<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock;

use Sylius\Behat\Page\SymfonyPage;

class ShowPage extends SymfonyPage implements ShowPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBlockContents()
    {
        return $this->getElement('cmf-block')->getHtml();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockImageUrl()
    {
        return $this->getElement('cmf-block')->find('css', 'img')->getAttribute('src');
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'cmf-block' => '#lakion_cms_block_preview',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        return 'lakion_cms_admin_taxon_block_show';
    }
}
