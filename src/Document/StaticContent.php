<?php

namespace Lakion\CmsPlugin\Document;

use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Cmf\Bundle\ContentBundle\Doctrine\Phpcr\StaticContent as BaseStaticContent;

class StaticContent extends BaseStaticContent implements ResourceInterface
{
}
