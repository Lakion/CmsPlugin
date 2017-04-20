<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock;

use Behat\Mink\Driver\Selenium2Driver;
use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;
use Sylius\Behat\Service\AutocompleteHelper;

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
    public function changeTaxonTo($taxonName)
    {
        if ($this->getDriver() instanceof Selenium2Driver) {
            AutocompleteHelper::chooseValue($this->getSession(), $this->getElement('taxon'), $taxonName);
        }
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
    public function getTaxon()
    {
        return $this->getElement('taxon')->find('css', 'option:selected')->getText();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'body' => '#lakion_cms_taxon_block_body',
            'link' => '#lakion_cms_taxon_block_linkUrl',
            'taxon' => '#lakion_cms_taxon_block_taxon',
            'title' => '#lakion_cms_taxon_block_title',
        ]);
    }
}
