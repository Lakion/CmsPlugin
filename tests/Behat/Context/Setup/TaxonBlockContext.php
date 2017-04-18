<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class TaxonBlockContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $taxonBlockExampleFactory;

    /**
     * @var ObjectManager
     */
    private $taxonBlockManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $taxonBlockExampleFactory
     * @param ObjectManager $taxonBlockManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $taxonBlockExampleFactory,
        ObjectManager $taxonBlockManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->taxonBlockExampleFactory = $taxonBlockExampleFactory;
        $this->taxonBlockManager = $taxonBlockManager;
    }

    /**
     * @Given the store has taxon block :name
     */
    public function theStoreHasTaxonBlock($name)
    {
        $taxonBlock = $this->taxonBlockExampleFactory->create(['name' => $name]);

        $this->taxonBlockManager->persist($taxonBlock);
        $this->taxonBlockManager->flush();

        $this->sharedStorage->set('taxon_block', $taxonBlock);
    }

    /**
     * @Given /^the store has taxon block "([^"]+)" with (body|title|link) "([^"]+)"$/
     */
    public function theStoreHasTaxonBlockWithField($name, $field, $value)
    {
        $taxonBlock = $this->taxonBlockExampleFactory->create(['name' => $name, $field => $value]);

        $this->taxonBlockManager->persist($taxonBlock);
        $this->taxonBlockManager->flush();

        $this->sharedStorage->set('taxon_block', $taxonBlock);
    }

    /**
     * @Given /^the store has taxon block "([^"]+)" with (taxon "[^"]+")$/
     */
    public function theStoreHasTaxonBlockWithTaxon($name, TaxonInterface $taxon)
    {
        $taxonBlock = $this->taxonBlockExampleFactory->create(['name' => $name, 'taxon' => $taxon]);

        $this->taxonBlockManager->persist($taxonBlock);
        $this->taxonBlockManager->flush();

        $this->sharedStorage->set('taxon_block', $taxonBlock);
    }
}
