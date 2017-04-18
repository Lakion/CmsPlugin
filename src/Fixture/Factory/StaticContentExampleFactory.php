<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\StaticContent;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class StaticContentExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $staticContentFactory;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param FactoryInterface $staticContentFactory
     */
    public function __construct(FactoryInterface $staticContentFactory)
    {
        $this->staticContentFactory = $staticContentFactory;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefault('title', function (Options $options) {
                    return $this->faker->words(3, true);
                })
                ->setAllowedTypes('title', 'string')

                ->setDefault('name', function (Options $options) {
                    return StringInflector::nameToCode($options['title']);
                })
                ->setAllowedTypes('name', 'string')

                ->setDefault('body', function (Options $options) {
                    return $this->faker->paragraphs(4, true);
                })
                ->setAllowedTypes('body', 'string')

                ->setDefault('publishable', function (Options $options) {
                    return $this->faker->boolean(90);
                })
                ->setAllowedTypes('publishable', 'bool')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var StaticContent $staticContent */
        $staticContent = $this->staticContentFactory->createNew();
        $staticContent->setTitle($options['title']);
        $staticContent->setName($options['name']);
        $staticContent->setBody($options['body']);
        $staticContent->setPublishable($options['publishable']);

        return $staticContent;
    }
}
