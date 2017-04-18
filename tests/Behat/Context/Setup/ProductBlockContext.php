<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductBlockContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $productBlockExampleFactory;

    /**
     * @var ObjectManager
     */
    private $productBlockManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $productBlockExampleFactory
     * @param ObjectManager $productBlockManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $productBlockExampleFactory,
        ObjectManager $productBlockManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->productBlockExampleFactory = $productBlockExampleFactory;
        $this->productBlockManager = $productBlockManager;
    }

    /**
     * @Given the store has product block :name
     */
    public function theStoreHasProductBlock($name)
    {
        $productBlock = $this->productBlockExampleFactory->create(['name' => $name]);

        $this->productBlockManager->persist($productBlock);
        $this->productBlockManager->flush();

        $this->sharedStorage->set('product_block', $productBlock);
    }

    /**
     * @Given /^the store has product block "([^"]+)" with (body|title|link) "([^"]+)"$/
     */
    public function theStoreHasProductBlockWithField($name, $field, $value)
    {
        $productBlock = $this->productBlockExampleFactory->create(['name' => $name, $field => $value]);

        $this->productBlockManager->persist($productBlock);
        $this->productBlockManager->flush();

        $this->sharedStorage->set('product_block', $productBlock);
    }

    /**
     * @Given /^the store has product block "([^"]+)" with (product "[^"]+")$/
     */
    public function theStoreHasProductBlockWithProduct($name, ProductInterface $product)
    {
        $productBlock = $this->productBlockExampleFactory->create(['name' => $name, 'product' => $product]);

        $this->productBlockManager->persist($productBlock);
        $this->productBlockManager->flush();

        $this->sharedStorage->set('product_block', $productBlock);
    }
}
