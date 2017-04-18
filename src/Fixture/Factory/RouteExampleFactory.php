<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\Route;
use Lakion\CmsPlugin\Document\StaticContent;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RouteExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $routeFactory;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param FactoryInterface $routeFactory
     * @param RepositoryInterface $staticContentRepository
     */
    public function __construct(FactoryInterface $routeFactory, RepositoryInterface $staticContentRepository)
    {
        $this->routeFactory = $routeFactory;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefault('name', function (Options $options) {
                    return StringInflector::nameToCode($this->faker->words(3, true));
                })
                ->setAllowedTypes('name', 'string')

                ->setDefault('content', LazyOption::randomOne($staticContentRepository))
                ->setAllowedTypes('content', ['string', StaticContent::class])
                ->setNormalizer('content', LazyOption::findOneBy($staticContentRepository, 'name'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var Route $route */
        $route = $this->routeFactory->createNew();
        $route->setName($options['name']);
        $route->setContent($options['content']);

        return $route;
    }
}
