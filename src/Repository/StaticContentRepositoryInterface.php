<?php

namespace Lakion\CmsPlugin\Repository;

use Lakion\CmsPlugin\Document\StaticContent;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface StaticContentRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $name
     *
     * @return StaticContent|null
     */
    public function findPublishedOneByName($name);
}
