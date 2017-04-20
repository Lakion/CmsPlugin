<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\CustomBlock;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CustomBlockExampleFactory implements ExampleFactoryInterface
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
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;

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
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var CustomBlock $stringBlock */
        $stringBlock = $this->factory->createNew();
        $stringBlock->setName($options['name']);
        $stringBlock->setTitle($options['name']);
        $stringBlock->setBody($options['body']);
        $stringBlock->setLinkUrl($options['link']);

        return $stringBlock;
    }
}
