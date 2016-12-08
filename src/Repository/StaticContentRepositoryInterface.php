<?php

namespace Lakion\SyliusCmsBundle\Repository;

use Lakion\SyliusCmsBundle\Document\StaticContent;

interface StaticContentRepositoryInterface
{
    /**
     * @param string $name
     *
     * @return StaticContent|null
     */
    public function findPublishedOneByName($name);
}
