<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock;

use Behat\Mink\Driver\Selenium2Driver;
use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;
use Sylius\Behat\Service\AutocompleteHelper;

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
    public function chooseTaxon($taxonName)
    {
        if ($this->getDriver() instanceof Selenium2Driver) {
            AutocompleteHelper::chooseValue($this->getSession(), $this->getElement('taxon'), $taxonName);
        }
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
            'body' => '#lakion_cms_taxon_block_body',
            'link' => '#lakion_cms_taxon_block_linkUrl',
            'name' => '#lakion_cms_taxon_block_name',
            'taxon' => '#lakion_cms_taxon_block_taxon',
            'title' => '#lakion_cms_taxon_block_title',
        ]);
    }
}
