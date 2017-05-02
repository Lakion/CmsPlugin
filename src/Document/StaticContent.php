<?php

namespace Lakion\CmsPlugin\Document;

use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Cmf\Bundle\ContentBundle\Doctrine\Phpcr\StaticContent as BaseStaticContent;

class StaticContent extends BaseStaticContent implements ResourceInterface
{
    /**
     * @var string
     */
    private $metaKeywords;

    /**
     * @var string
     */
    private $metaDescription;

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }
}
