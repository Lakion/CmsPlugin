<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class RouteContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $routeExampleFactory;

    /**
     * @var ObjectManager
     */
    private $routeManager;

    /**
     * @var RepositoryInterface
     */
    private $staticContentRepository;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $routeExampleFactory
     * @param ObjectManager $routeManager
     * @param RepositoryInterface $staticContentRepository
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $routeExampleFactory,
        ObjectManager $routeManager,
        RepositoryInterface $staticContentRepository
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->routeExampleFactory = $routeExampleFactory;
        $this->routeManager = $routeManager;
        $this->staticContentRepository = $staticContentRepository;
    }

    /**
     * @Given the store has route :name
     */
    public function theStoreHasRoute($name)
    {
        $route = $this->routeExampleFactory->create(['name' => $name]);

        $this->routeManager->persist($route);
        $this->routeManager->flush();

        $this->sharedStorage->set('route', $route);
    }

    /**
     * @Given the store has routes :firstName and :secondName
     */
    public function theStoreHasRoutes(...$routesNames)
    {
        foreach ($routesNames as $routesName) {
            $this->theStoreHasRoute($routesName);
        }
    }

    /**
     * @Given the store has route :name with :contentTitle as its content
     */
    public function theStoreHasRouteWithAsItsContent($name, $contentTitle)
    {
        $content = $this->staticContentRepository->findOneBy(['title' => $contentTitle]);

        $route = $this->routeExampleFactory->create(['name' => $name, 'content' => $content]);

        $this->routeManager->persist($route);
        $this->routeManager->flush();

        $this->sharedStorage->set('route', $route);
    }
}
