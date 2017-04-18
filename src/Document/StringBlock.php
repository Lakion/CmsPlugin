<?php

namespace Lakion\CmsPlugin\Document;

use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\StringBlock as BaseStringBlock;

class StringBlock extends BaseStringBlock implements ResourceInterface
{
}
