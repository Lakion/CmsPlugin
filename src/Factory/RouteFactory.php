<?php

namespace Lakion\CmsPlugin\Factory;

use Doctrine\ODM\PHPCR\DocumentManagerInterface;
use Lakion\CmsPlugin\Document\Route;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

final class RouteFactory implements FactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $decoratedFactory;

    /**
     * @var DocumentManagerInterface
     */
    private $documentManager;

    /**
     * @var string
     */
    private $routeParentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param DocumentManagerInterface $documentManager
     * @param array $routeParentsPaths
     */
    public function __construct(FactoryInterface $decoratedFactory, DocumentManagerInterface $documentManager, array $routeParentsPaths)
    {
        $this->decoratedFactory = $decoratedFactory;
        $this->documentManager = $documentManager;

        Assert::notEmpty($routeParentsPaths);
        $this->routeParentPath = current($routeParentsPaths);
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        /** @var Route $route */
        $route = $this->decoratedFactory->createNew();
        $route->setParentDocument($this->documentManager->find(null, $this->routeParentPath));

        return $route;
    }
}
