<?php

namespace Lakion\CmsPlugin\Document;

use Sylius\Component\Core\Model\TaxonInterface;

class TaxonBlock extends CustomBlock
{
    /**
     * @var TaxonInterface
     */
    protected $taxon;

    /**
     * @var string
     */
    protected $taxonCode;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'lakion_cms.block.taxon';
    }

    /**
     * @return TaxonInterface
     */
    public function getTaxon()
    {
        return $this->taxon;
    }

    /**
     * @param TaxonInterface $taxon
     */
    public function setTaxon(TaxonInterface $taxon)
    {
        $this->taxon = $taxon;
        $this->taxonCode = $taxon->getCode();
    }

    /**
     * @return string
     */
    public function getTaxonCode()
    {
        return $this->taxonCode;
    }

    /**
     * @param string $taxonCode
     */
    public function setTaxonCode($taxonCode)
    {
        $this->taxonCode = $taxonCode;
    }
}
