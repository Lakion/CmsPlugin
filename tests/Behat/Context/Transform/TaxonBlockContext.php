<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class TaxonBlockContext implements Context
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Transform :taxonBlock
     */
    public function nameToDocument($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}
