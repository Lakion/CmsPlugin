<?php

namespace Lakion\CmsPlugin\Repository;

use Lakion\CmsPlugin\Document\StaticContent;

interface StaticContentRepositoryInterface
{
    /**
     * @param string $name
     *
     * @return StaticContent|null
     */
    public function findPublishedOneByName($name);
}
