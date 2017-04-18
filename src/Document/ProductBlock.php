<?php

namespace Lakion\CmsPlugin\Document;

use Sylius\Component\Core\Model\ProductInterface;

class ProductBlock extends CustomBlock
{
    /**
     * @var ProductInterface
     */
    protected $product;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'lakion_cms.block.product';
    }

    /**
     * @return ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param ProductInterface $product
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
        $this->productCode = $product->getCode();
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }
}
