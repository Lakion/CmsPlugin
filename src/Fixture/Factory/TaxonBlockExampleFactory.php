<?php

namespace Lakion\CmsPlugin\Fixture\Factory;

use Lakion\CmsPlugin\Document\TaxonBlock;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TaxonBlockExampleFactory implements ExampleFactoryInterface
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
    private $taxonRepository;

    /**
     * @param FactoryInterface $factory
     * @param RepositoryInterface $taxonRepository
     */
    public function __construct(FactoryInterface $factory, RepositoryInterface $taxonRepository)
    {
        $this->factory = $factory;
        $this->taxonRepository = $taxonRepository;

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

                ->setDefault('taxon', LazyOption::randomOne($this->taxonRepository))
                ->setNormalizer('taxon', LazyOption::findOneBy($this->taxonRepository, 'code'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var TaxonBlock $stringBlock */
        $stringBlock = $this->factory->createNew();
        $stringBlock->setName($options['name']);
        $stringBlock->setTitle($options['name']);
        $stringBlock->setBody($options['body']);
        $stringBlock->setLinkUrl($options['link']);
        $stringBlock->setTaxon($options['taxon']);

        return $stringBlock;
    }
}
