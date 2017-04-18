<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class CustomBlockContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $customBlockExampleFactory;

    /**
     * @var ObjectManager
     */
    private $customBlockManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $customBlockExampleFactory
     * @param ObjectManager $customBlockManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $customBlockExampleFactory,
        ObjectManager $customBlockManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->customBlockExampleFactory = $customBlockExampleFactory;
        $this->customBlockManager = $customBlockManager;
    }

    /**
     * @Given the store has custom block :name
     */
    public function theStoreHasCustomBlock($name)
    {
        $customBlock = $this->customBlockExampleFactory->create(['name' => $name]);

        $this->customBlockManager->persist($customBlock);
        $this->customBlockManager->flush();

        $this->sharedStorage->set('custom_block', $customBlock);
    }

    /**
     * @Given /^the store has custom block "([^"]+)" with (body|title|link) "([^"]+)"$/
     */
    public function theStoreHasCustomBlockWithField($name, $field, $value)
    {
        $customBlock = $this->customBlockExampleFactory->create(['name' => $name, $field => $value]);

        $this->customBlockManager->persist($customBlock);
        $this->customBlockManager->flush();

        $this->sharedStorage->set('custom_block', $customBlock);
    }
}
