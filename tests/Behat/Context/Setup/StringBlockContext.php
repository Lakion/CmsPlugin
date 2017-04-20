<?php

namespace Tests\Lakion\CmsPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class StringBlockContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $stringBlockExampleFactory;

    /**
     * @var ObjectManager
     */
    private $stringBlockManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $stringBlockExampleFactory
     * @param ObjectManager $stringBlockManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $stringBlockExampleFactory,
        ObjectManager $stringBlockManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->stringBlockExampleFactory = $stringBlockExampleFactory;
        $this->stringBlockManager = $stringBlockManager;
    }

    /**
     * @Given the store has string block :name
     */
    public function theStoreHasStringBlock($name)
    {
        $stringBlock = $this->stringBlockExampleFactory->create([
            'name' => $name,
        ]);

        $this->stringBlockManager->persist($stringBlock);
        $this->stringBlockManager->flush();

        $this->sharedStorage->set('string_block', $stringBlock);
    }

    /**
     * @Given the store has string block :name with body :body
     */
    public function theStoreHasStringBlockWithBody($name, $body)
    {
        $stringBlock = $this->stringBlockExampleFactory->create([
            'name' => $name,
            'body' => $body,
        ]);

        $this->stringBlockManager->persist($stringBlock);
        $this->stringBlockManager->flush();

        $this->sharedStorage->set('string_block', $stringBlock);
    }
}
