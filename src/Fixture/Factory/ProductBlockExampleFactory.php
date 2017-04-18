<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\ProductBlock;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductBlockExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @var RepositoryInterface
     */
    private $productRepository;

    /**
     * @param FactoryInterface $factory
     * @param RepositoryInterface $productRepository
     */
    public function __construct(FactoryInterface $factory, RepositoryInterface $productRepository)
    {
        $this->factory = $factory;
        $this->productRepository = $productRepository;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefault('name', function (Options $options) {
                    return StringInflector::nameToCode($options['title']);
                })
                ->setAllowedTypes('name', 'string')

                ->setDefault('title', function (Options $options) {
                    return $this->faker->words(3, true);
                })
                ->setAllowedTypes('title', 'string')

                ->setDefault('body', function (Options $options) {
                    return $this->faker->sentence();
                })
                ->setAllowedTypes('body', 'string')

                ->setDefault('link', function (Options $options) {
                    return $this->faker->url;
                })
                ->setAllowedTypes('link', 'string')

                ->setDefault('product', LazyOption::randomOne($this->productRepository))
                ->setNormalizer('product', LazyOption::findOneBy($this->productRepository, 'code'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var ProductBlock $stringBlock */
        $stringBlock = $this->factory->createNew();
        $stringBlock->setName($options['name']);
        $stringBlock->setTitle($options['name']);
        $stringBlock->setBody($options['body']);
        $stringBlock->setLinkUrl($options['link']);
        $stringBlock->setProduct($options['product']);

        return $stringBlock;
    }
}
