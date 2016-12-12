<?php

namespace Lakion\SyliusCmsBundle\Factory;

use Doctrine\Common\Persistence\ObjectManager;
use Lakion\SyliusCmsBundle\Document\Route;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

final class RouteFactory implements FactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $decoratedFactory;

    /**
     * @var ObjectManager
     */
    private $documentManager;

    /**
     * @var string
     */
    private $routeParentPath;

    /**
     * @param FactoryInterface $decoratedFactory
     * @param ObjectManager $documentManager
     * @param array $routeParentsPaths
     */
    public function __construct(FactoryInterface $decoratedFactory, ObjectManager $documentManager, $routeParentsPaths)
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
