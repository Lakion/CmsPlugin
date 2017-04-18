<?php

namespace Tests\Lakion\CmsPlugin\Behat\Page\Admin\TaxonBlock;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $body
     */
    public function setBody($body);

    /**
     * @param string $link
     */
    public function setLink($link);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @param string $taxonName
     */
    public function chooseTaxon($taxonName);

    /**
     * @param string $relativePath
     */
    public function attachImage($relativePath);
}
