<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\StringBlock;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class StringBlockExampleFactory implements ExampleFactoryInterface
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
                    return StringInflector::nameToCode($this->faker->words(3, true));
                })
                ->setAllowedTypes('name', 'string')

                ->setDefault('body', function (Options $options) {
                    return $this->faker->sentence();
                })
                ->setAllowedTypes('body', 'string')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var StringBlock $stringBlock */
        $stringBlock = $this->factory->createNew();
        $stringBlock->setName($options['name']);
        $stringBlock->setBody($options['body']);

        return $stringBlock;
    }
}
